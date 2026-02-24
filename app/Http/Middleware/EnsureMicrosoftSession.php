<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureMicrosoftSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 1) {
            return $next($request);
        }

        // 1. SUCCESS PATH
        if (Auth::check()) {
            $lastCheck = session('sso_last_validated_at');

            if ($lastCheck) {
                $lastCheckTime = Carbon::parse($lastCheck);
                $expirationTime = $lastCheckTime->copy()->addSeconds(180);

                if (now()->lessThan($expirationTime)) {
                    return $next($request);
                }
            }
        }

        // 2. FAILURE PATH (Session Expired)
        Auth::logout();
        $request->session()->forget('sso_session_valid');
        $destination = route('sso.silent-login');

        if ($request->method() === 'GET') {
            session(['url.intended' => $request->fullUrl()]);
        }

        // 3. THE LIVEWIRE INTERCEPT
        if ($request->hasHeader('X-Livewire-Navigate')) {
            $html = <<<HTML
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <style>
                        body {
                            margin: 0;
                            height: 100vh;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background-color: #f8fafc;
                        }
                        .spinner {
                            width: 40px;
                            height: 40px;
                            border: 4px solid #e2e8f0;
                            border-top-color: #3b82f6;
                            border-radius: 50%;
                            animation: spin 1s linear infinite;
                        }
                        
                        @keyframes spin {
                            to { transform: rotate(360deg); }
                        }
                    </style>
                    <script>
                        // Execute the redirect
                        window.location.replace("{$destination}");
                    </script>
                </head>
                <body>
                    <div class="flex flex-col gap-6 items-center">
                        <div class="spinner"></div>
                        <div class="text-blue-600 italic">Memeriksa session microsoft...</div>
                    </div>
                </body>
                </html>
            HTML;

            return response($html, 200);
        }

        // 4. STANDARD REQUEST (Direct URL visits or hard refreshes)
        return redirect()->to($destination);
    }
}

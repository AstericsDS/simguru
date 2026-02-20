<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SsoController;
use Symfony\Component\HttpFoundation\Response;

class EnsureMicrosoftSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $lastCheck = session('sso_last_validated_at');

            if ($lastCheck) {
                $lastCheckTime = Carbon::parse($lastCheck);

                $expirationTime = $lastCheckTime->copy()->addSeconds(15);

                if (now()->lessThan($expirationTime)) {
                    return $next($request);
                }
                Auth::logout();
                return redirect()->to(route('login'));
            }
        }
        return redirect()->to(route('sso.silent-login'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SsoController extends Controller
{
    public function redirectToProvider()
    {
        $clientId = config('sso.client_id');
        $loginUrl = config('sso.login_url');

        $response = Http::post($loginUrl, [
            'client_id' => $clientId
        ]);

        if ($response->failed()) {
            return redirect(route('login'))->with('error', 'Failed to connect to SSO server');
        }

        $data = $response->json();

        $publicKey = $data['data']['public_key'] ?? null;
        $privateKey = $data['data']['private_key'] ?? null;
        if (!$publicKey || !$privateKey) {
            return redirect(route('login'))->with('error', 'Invalid response from SSO server.');
        }
        session(['sso_private_key' => $privateKey]);

        $ssoRedirectUrl = config('sso.redirect_url') . '?public_key=' . $publicKey;
        return redirect()->away($ssoRedirectUrl);
    }

    public function handleProviderCallback(Request $request)
    {
        $privateKey = session('sso_private_key');
        $jwt = $request->query('token');

        if (!$privateKey || !$jwt) {
            return redirect(route('login'))->with('error', 'SSO authentication failed. Invalid session');
        }

        try {
            $decoded = JWT::decode($jwt, new Key($privateKey, 'HS256'));
        } catch(\Exception $e) {
            return redirect(route('login'))->with('error', 'Invalid SSO token. Please try again.');
        }

        if ($decoded->status === 'mahasiswa') {
            $role = 2;
        } else {
            $role = 1;
        }

        $user = User::updateOrCreate(
            ['email' => $decoded->email],
            [
                'name' => $decoded->name,
                'password' => bcrypt(Str::random(16)),
                'role' => $role,
            ]
            );
        
        Auth::login($user, true);

        $request->session()->forget('sso_private_key');
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}

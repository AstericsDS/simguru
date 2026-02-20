<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SsoController extends Controller
{
    public function redirectToProviderSilent()
    {
        $clientId = config('sso.client_id');
        $loginUrl = config('sso.login_url');

        $response = Http::post($loginUrl, [
            'client_id' => $clientId
        ]);

        if ($response->failed()) {
            return redirect(route('login'))->with('error', 'Gagal terhubung ke server SSO');
        }

        $data = $response->json();
        $publicKey = $data['data']['public_key'] ?? null;
        $privateKey = $data['data']['private_key'] ?? null;
        if (!$publicKey || !$privateKey) {
            return redirect(route('login'))->with('error', 'Respons tidak valid dari server SSO');
        }
        session(['sso_private_key' => $privateKey]);
        $ssoRedirectUrl = config('sso.redirect_url') . 'silent-login-microsoft?public_key=' . $publicKey;
        return redirect()->away($ssoRedirectUrl);
    }

    public function redirectToProvider()
    {
        $clientId = config('sso.client_id');
        $loginUrl = config('sso.login_url');

        $response = Http::post($loginUrl, [
            'client_id' => $clientId
        ]);

        if ($response->failed()) {
            return redirect(route('login'))->with('error', 'Gagal terhubung ke server SSO');
        }

        $data = $response->json();
        $publicKey = $data['data']['public_key'] ?? null;
        $privateKey = $data['data']['private_key'] ?? null;
        if (!$publicKey || !$privateKey) {
            return redirect(route('login'))->with('error', 'Respons tidak valid dari server SSO');
        }
        session(['sso_private_key' => $privateKey]);

        $ssoRedirectUrl = config('sso.redirect_url') . 'login-microsoft?public_key=' . $publicKey;
        return redirect()->away($ssoRedirectUrl);
    }

    public function handleProviderCallback(Request $request)
    {
        $privateKey = session('sso_private_key');
        $jwt = $request->query('token');

        if (!$privateKey || !$jwt) {
            return redirect(route('login'))->with('error', 'Autentikasi SSO gagal. Sesi tidak valid');
        }

        try {
            $decoded = JWT::decode($jwt, new Key($privateKey, 'HS256'));
        } catch (\Exception $e) {
            return redirect(route('login'))->with('error', 'Token SSO tidak valid. Silakan coba lagi');
        }
        $user = User::where('email', $decoded->email)->first();
        if ($user) {
            if ($user->type === 'regular') {
                $userCreate = User::updateOrCreate(
                    ['email' => $decoded->email],
                    [
                        'name' => $decoded->name,
                        'password' => bcrypt($decoded->id),
                    ]
                );
                Auth::login($userCreate, true);
            } else {
                Auth::login($user, true);
            }
            session(['sso_last_validated_at' => now(), 'sso_session_valid' => true]);
            $request->session()->forget('sso_private_key');
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->intended(route('login'))->with('error', 'Kamu tidak memiliki akses');
        }
    }
}

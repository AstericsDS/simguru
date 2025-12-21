<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SSO
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = $request->header('Authorization');

        if (!$auth || !str_starts_with($auth, 'Bearer ')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        $jwt = substr($auth, 7);

        try {
            // ⚠️ ideally public key, not per-session private key
            $decoded = JWT::decode($jwt, new Key(config('sso.api_key'), 'HS256'));
        } catch (Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $user = User::where('email', $decoded->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        // Attach user to request (NO session)
        $request->attributes->set('user', $user);
        return $next($request);
    }
}

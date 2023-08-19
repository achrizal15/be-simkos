<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('credentials', 'password'); // Change 'username' to 'login'

        $field = filter_var($credentials['credentials'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $credentials['credentials'], 'password' => $credentials['password']])) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
    public function logout(Request $request)
    {
        $user = $request->user();

        // Revoke all of the user's tokens...
        $user->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}

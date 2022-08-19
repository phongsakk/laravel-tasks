<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::with(['prefix', 'role'])
            ->where('email', $validated['email'])
            ->first();
        if (!$user) return response([
            'message' => 'User not found'
        ], 404);
        if (!$user->isVerified()) return response([
            'message' => 'The email are not verified yet. Please check your email and try again'
        ], 401);
        $password_is_match = Hash::check($validated['password'], $user->password);
        if (!$password_is_match) return response([
            'message' => 'Password mismatch'
        ], 401);
        $token = $user->createToken('loginToken')->plainTextToken;
        return response([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function logout()
    {
        $is_success =  !!request()->user()->currentAccessToken()->delete();
        return response([
            'message' => $is_success ? 'Logout successfully' : 'Logout failed',
        ], $is_success ? 200 : 203);
    }

    public function is_login()
    {
        $uid = auth('sanctum')->id();
        $user = User::where('id', $uid)->with(["role", "prefix"])->first();
        return response([
            'isLogin' => $isLogin = auth('sanctum')->check(),
            'isGuest' => !$isLogin,
            'hasToken' => request()->hasHeader('Authorization'),
            'user' => $user
        ], 200);
    }
}

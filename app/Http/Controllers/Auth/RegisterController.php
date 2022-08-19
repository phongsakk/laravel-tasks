<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\VerifyRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use App\Models\Verify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['role_id'] = $validated['role_id'] ?? 3;
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        $verify = Verify::create([
            'user_id' => $user->id,
            'verify_token' => Str::random(64),
            'origin' => $request->origin
        ]);
        Mail::to($user->email)->send(new VerificationMail($user, $verify));
        return response([
            'message' => 'Registration successful. Please check your registration email.',
        ]);
    }

    public function verify(VerifyRequest $request)
    {
        $validated = $request->validated();
        $token = $validated['token'];
        $id = base64_decode($validated['id']);
        $user = User::find($id);
        if (is_null($user)) return response([
            'message' => 'User not found.'
        ], 404);
        $schema = $user->verificationSchema;
        if ($user->isVerified() and !is_null($schema)) $schema->delete();
        if ($user->isVerified()) return response([
            'message' => 'This email address is already verified. You can now login.',
        ], 200);
        if ($token !== $schema->verify_token) return response([
            'message' => 'Token is invalid.'
        ], 400);
        $user->email_verified_at = now();
        $user->save();
        $schema->delete();
        return response([
            'message' => 'Verified email was successfully',
            'token' => $user->createToken('loginToken')->plainTextToken,
        ], 201);
    }
}

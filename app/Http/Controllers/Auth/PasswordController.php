<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordChangeRequest;
use App\Http\Requests\Auth\PasswordCredentialRequest;
use App\Http\Requests\Auth\PasswordResetRequest;
use App\Http\Requests\Auth\PasswordResetSendMailRequest;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function passwordForget(PasswordResetSendMailRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['email'];
        $user = User::findByEmail($email);
        $no_user = !$user;
        if ($no_user) return response([
            'message' => 'The email address is not registered yet.',
        ], 404);
        $origin = request()->headers->get('origin');
        Mail::to($email)->send(new PasswordResetMail($user, $origin));
        return response([
            'message' => 'Reset password link has been sent'
        ]);
    }

    public function passwordReset(PasswordResetRequest $request)
    {
        $validated = $request->validated();
        $user = User::findByEmail($validated['email']);
        if (!$user) return response([
            'message' => 'Invalid email address'
        ], 404);
        $user->update([
            'password' => bcrypt($validated['password']),
        ]);
        $token = $user->createToken('loginToken')->plainTextToken;
        return response([
            'message' => 'Password changed successfully',
            'token' => $token
        ]);
    }

    public function passwordResetCredential(PasswordCredentialRequest $request)
    {
        // ? Default return value.
        $response404 = response([
            'message' => 'Link is invalid'
        ], 404);

        // ^ Check parameters
        $validated = $request->validated();
        $cred_encode = $validated['token'];
        $cred_decode = base64_decode(base64_decode($cred_encode));
        $cred = explode('∑', $cred_decode);
        if (count($cred) != 3) return $response404;

        $cred_email = $cred[0];
        $cred_exp_time = $cred[1];
        $cred_old_password = $cred[2];
        // ^ Serch user by email.
        $user = User::findByEmail($cred_email);
        if (!$user) return $response404;

        // ^ Check expired link.
        $exp_time = Carbon::parse($cred_exp_time);
        $diff = $exp_time->diffInSeconds();
        if ($diff > 1800) return $response404;

        // ^ Check match password.
        $password_is_match = $cred_old_password === $user->password;
        if (!$password_is_match) return $response404;
        // * Return current email address.
        return response([
            'email' => $cred_email,
        ]);
    }

    public function passwordChange(PasswordChangeRequest $request)
    {
        $validated = $request->validated();
        $user = User::find(auth()->id());
        $user->update(['password' => bcrypt($validated['password'])]);
        return response(['message' => 'Password changed']);
    }
}

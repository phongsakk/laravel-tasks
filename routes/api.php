<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ^ Authentication routes
Route::match(['get', 'post'], 'is-login', [LoginController::class, 'is_login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('verify', [RegisterController::class, 'verify']);
Route::post('login', [LoginController::class, 'login']);
Route::match(['get', 'post'], 'logout', [LoginController::class, 'logout'])
    ->middleware('auth:sanctum');
Route::group(['prefix' => 'password'], function () {
    Route::post('forget', [PasswordController::class, 'passwordForget']);
    Route::post('credential', [PasswordController::class, 'passwordResetCredential']);
    Route::post('reset', [PasswordController::class, 'passwordReset']);
    Route::post('change', [PasswordController::class, 'passwordChange'])
        ->middleware('auth:sanctum');
});
// ^ Resource routes
Route::get('prefixes', [ResourceController::class, 'prefixes']);
// * Authenticated routes
Route::group(['middleware' => 'auth:sanctum'], function () {
});


// ! Test section. Remove when Use in production.
Route::get('', function () {
    $faker = Faker\Factory::create();
    $random = [];
    for ($i = 0; $i < 100; $i++) {
        $temp = base64_encode($faker->unique()->safeEmail());
        if (str_contains($temp, '/')) $temp = '************' . $temp;
        $random[$i] = $temp;
    }
    return response([
        'message' => 'Hello World!',
        'random' => $random
    ], 201);
});
Route::get('users', function () {
    return response(App\Models\User::with(['prefix', 'role'])->get(), 200);
});
Route::get('mail', function () {
    $user = App\Models\User::find(14);
    $verify = App\Models\Verify::find(1);
    \Illuminate\Support\Facades\Mail::to($user->email)
        ->send(
            new App\Mail\VerificationMail($user, $verify)
        );
});

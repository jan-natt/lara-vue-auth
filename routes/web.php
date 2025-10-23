<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::post('/verify-otp', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|numeric',
    ]);

    $cachedOtp = cache('otp_' . $request->email);
    $userData = cache('pending_user_' . $request->email);

    if (!$cachedOtp || !$userData) {
        return response()->json(['message' => 'OTP expired or invalid.'], 400);
    }

    if ($cachedOtp != $request->otp) {
        return response()->json(['message' => 'Invalid OTP.'], 400);
    }

    // Create and verify user
    $user = User::create([
        'name' => $userData['name'],
        'email' => $userData['email'],
        'password' => $userData['password'],
        'role' => $userData['role'],
        'profile_photo_path' => $userData['profile_photo_path'] ?? null,
        'email_verified_at' => now(),
    ]);

    // Clear OTP & pending data
    cache()->forget('otp_' . $request->email);
    cache()->forget('pending_user_' . $request->email);

    return response()->json(['message' => 'Email verified successfully!'], 200);
})->name('verify-otp');
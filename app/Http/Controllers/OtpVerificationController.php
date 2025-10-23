<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OtpVerificationController extends Controller
{
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        $cachedOtp = cache()->get('otp_' . $request->email);

        if (!$cachedOtp) {
            return response()->json(['otp' => 'OTP has expired or is invalid.']);
        }

        if($cachedOtp != $request->otp) {
            return response()->json(['otp' => 'Invalid OTP. Please try again.']);
        }

        $user = User::where('email', $request->email)->first();
        if($user)
        {
            $user->email_verified_at = now();
            $user->save();
        }

        cache()->forget('otp_' . $request->email);
        return redirect('login')->with('status', 'Your email has been verified successfully. You can now log in.');
    }
}

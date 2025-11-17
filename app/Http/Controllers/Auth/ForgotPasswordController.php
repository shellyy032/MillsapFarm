<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgotpass');
    }

    public function showForgot()
    {
        return view('auth.forgotpass');
    }

    public function submitForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'nullable|string'
        ]);

        if (!$request->otp) {

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'Email not found']);
            }

            $otp = rand(100000, 999999);

            Session::put('reset_email', $request->email);
            Session::put('reset_otp', $otp);

            Mail::raw("Your OTP code is: $otp", function ($msg) use ($request) {
                $msg->to($request->email)->subject('Millsap Farm - Password Reset OTP');
            });

            return back()->with('success', 'OTP has been sent to your email!');
        }

        if ($request->otp == Session::get('reset_otp')) {
            return redirect()->route('reset.form');
        }

        return back()->withErrors(['otp' => 'Invalid OTP']);
    }
}

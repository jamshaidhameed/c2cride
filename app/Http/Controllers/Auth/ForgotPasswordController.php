<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use NoCaptcha;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    

    // public function sendResetLinkEmail(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'g-recaptcha-response' => 'required|captcha',
    //     ]);

    //     $status = Password::sendResetLink($request->only('email'));

    //     return $status === Password::RESET_LINK_SENT
    //                 ? back()->with(['status' => __($status)])
    //                 : back()->withErrors(['email' => __($status)]);
    // }

    use SendsPasswordResetEmails;
}

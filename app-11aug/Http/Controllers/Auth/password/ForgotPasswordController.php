<?php

namespace App\Http\Controllers\Auth\password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomResetPasswordMail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function forgot_password_post(Request $request){
        
        $request->validate(
            [
                'email' => 'required',
            ]
            );
        
        $user = User::where('email',$request->email)->first();

        if (empty($user)) {
           
            return redirect()->back()->withErrors('Sorry no record found against your email address');
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        Mail::to($user->email)->send(new CustomResetPasswordMail($token));

       return back()->with('status', 'Password reset link sent to your email.');
       
    }

    public function showResetForm($token){

        $forgot_password = DB::table('password_reset_tokens')->where('token',$token)->first();

       return view('auth.newpasswords.reset',compact('token','forgot_password'));
    }
    public function resetPassword(Request $request){

        $request->validate([
            // 'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);
      
      $record = DB::table('password_reset_tokens')->where([
        // ['email', $request->email],
        ['token', $request->token],
        ])->first();

        if (!$record || Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['email' => 'Invalid or expired token']);
        }

        $user = \App\Models\User::where('email', $record->email)->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            DB::table('password_reset_tokens')->where('email', $record->email)->delete();
        }

      session()->flash('success','Password updated Successfully');

      return redirect()->route('login');
    }
}

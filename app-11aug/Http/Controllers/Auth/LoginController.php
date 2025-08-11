<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        $last_word = explode('/',$request->url());
        $last_word = end($last_word);

        if ($user->status == 0) {
            Auth::logout();
            return redirect()->back()->with('error' , 'Account disabled!');
        }

        $user_role = Role::find($user->role_id);                                                                                      

        // session( [ "user_role" => $user_role ] );

       if ( strtolower($user_role->name) == "admin" ) {
            return redirect()->intended( route( "admin.dashboard" ) );

        } else if ( strtolower($user_role->name) == "customer" || strtolower($user_role->name) == "user" ) {
            return redirect()->intended( route( "user.dashboard" ) );

        }

        Auth::logout();
    }
}

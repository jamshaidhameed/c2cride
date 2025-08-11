<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function setting()
    {
        // $currencies = Currency::get();

        return view('User.setting.profile',);
    }
    public function updateProfile(Request $request)
    {
        $messsages = array('password.min' => 'password length must be greater than 6 characters.');
        $rules = array(
            'full_name' => 'required',
            'phone' => 'required',
        );

        $validator = Validator::make(request()->all(), $rules, $messsages);
        if ($validator->fails()) {
            $messages = $validator->messages()->all();
            return response()->json(['message' => $messages[0], 'status' => 301]);
        }

        if ($request->filled('password')) {
            User::where('id', auth()->id())->update([
                'password' => bcrypt($request['password']),
            ]);
        }

        User::where('id', auth()->id())->update([
            'name' => $request['full_name'],
            'mobile_number' => $request['phone'],
            'address' => $request['address'],
        ]);

        $user = User::find(auth()->id());

        return response()->json(['message' => 'Profile is successfully updated!', 'status' => 200, 'user' => $user]);
    }
    public function updateWhatsAppNumber(Request $request)
    {
        $messsages = array('whatsapp_number' => 'whatsapp number is required.');
        $rules = array(
            'whatsapp_number' => 'required',
        );

        $validator = Validator::make(request()->all(), $rules, $messsages);
        if ($validator->fails()) {
            $messages = $validator->messages()->all();
            return response()->json(['message' => $messages[0], 'status' => 301]);
        }

        Ride::where('id',  $request['ride_id'])->update([
            'whatsapp_number' => $request['whatsapp_number'],
        ]);
        return response()->json(['message' => 'Whatsapp number is successfully updated!', 'status' => 200,]);
    }
    public function updateNotifications(Request $request)
    {

        $user = User::find(auth()->id());

        if ($request->filled('notifications')) {
            $notifications = 1;
        } else {
            $notifications = 0;
        }

        if ($request->filled('news')) {
            $news = 1;
        } else {
            $news = 0;
        }
        if ($request->filled('terms')) {
            $terms = 1;
        } else {
            $terms = 0;
        }

        $user->notifications = $notifications;
        $user->news = $news;
        $user->terms = $terms;
        $user->save();

        return response()->json(['message' => 'Your notification settings are updated!', 'status' => 200]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}

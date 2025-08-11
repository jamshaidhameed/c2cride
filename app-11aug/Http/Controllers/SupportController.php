<?php

namespace App\Http\Controllers;

use App\Mail\SupportRequest;
use App\Models\Support;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $currencies = Currency::get();

        return response()->view('User.setting.support');
    }
    public function callSupport(Request $request)
    {

        $messsages = array('mobile_number' => 'mobile number is required.');
        $rules = array(
            'question' => 'required',
            'mobile_number' => 'required',
        );

        $validator = Validator::make(request()->all(), $rules, $messsages);
        if ($validator->fails()) {
            $messages = $validator->messages()->all();
            return response()->json(['message' => $messages[0], 'status' => 301]);
        }
        $new_support = Support::create([
            'user_id' => auth()->id(),
            'question' => $request['question'],
            'mobile_number' => $request['mobile_number'],
        ]);

        $support = Support::find($new_support->id);
        $user = $support->user()->first();
        $email = new SupportRequest($user, $support);
        Mail::to($user['email'])->send($email);
        return response()->json(['message' => 'Thank you for the mail, our team will contact you in 15 minutes', 'status' => 200]);
    }

    public function emailSupport(Request $request)
    {
        $messsages = array('message' => 'message is required.');
        $rules = array(
            'subject' => 'required',
            'message' => 'required',
        );

        $validator = Validator::make(request()->all(), $rules, $messsages);
        if ($validator->fails()) {
            $messages = $validator->messages()->all();
            return response()->json(['message' => $messages[0], 'status' => 301]);
        }
        $new_support = Support::create([
            'user_id' => auth()->id(),
            'subject' => $request['subject'],
            'message' => $request['message'],
        ]);

        $support = Support::find($new_support->id);
        $user = $support->user()->first();
        $email = new SupportRequest($user, $support);
        Mail::to($user['email'])->send($email);
        return response()->json(['message' => 'Thank you for the mail, our team will contact you in 15 minutes', 'status' => 200]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupportRequest $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        //
    }
}

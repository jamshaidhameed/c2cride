<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Password;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[App\Http\Controllers\Front\HomeController::class,'index'])->name('front.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


require __DIR__.'/front.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';

// Forgot Password Routes 

Route::post('password/reset/post',[App\Http\Controllers\Auth\password\ForgotPasswordController::class,'forgot_password_post'])->name('password.reset.post');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\password\ForgotPasswordController::class, 'showResetForm'])->name('custom.password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\password\ForgotPasswordController::class, 'resetPassword'])->name('custom.password.update');

//Cashe Clear

Route::get('/cache/clear',function(){
    $response_arr = [];
    Artisan::call('cache:clear');
    // echo "Cashe Cleared<br>";
    array_push($response_arr,"Cashe Cleared");
    Artisan::call('config:clear');
    // echo "Config Cleared<br>";
    array_push($response_arr,"Config Cleared");
    Artisan::call('route:clear');
    // echo "Route Cleared<br>";
    array_push($response_arr,"Route Cleared");
    Artisan::call('view:clear');
    // echo "View Cleared<br>";
    array_push($response_arr,"View Cleared");
    
    Artisan::call('optimize:clear');
    // echo "Optimize Cleared<br>";
    array_push($response_arr,"Optimize Cleared");
    Artisan::call('up');
    // echo "Application Successfully Up";
    array_push($response_arr,"Application Up Successfully");

    Artisan::call('clear-compiled');
    array_push($response_arr,"Compiled Assets are Removed Successfullly");

    // return redirect()->route('front.index');

    return response()->json($response_arr);
    
    
});


Route::get('currencies-list',function(){
   $currencies = currencies();

   return $currencies;
});

Route::get('change-currency/{code}',function($code){

    session(['currency' => $code]); 

    return redirect()->back();

})->name('currency.change');

Route::get('currency-format/{amount}', function($amount) {
    return response()->json(currency_format($amount));
});
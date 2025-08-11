<?php

Route::post('rides-step-one',[App\Http\Controllers\Front\HomeController::class,'rides_step_one'])->name('rides.step.one');

Route::get('/rides-step-two',[App\Http\Controllers\Front\HomeController::class,'step_no_two'])->name('rides.step.two');

Route::post('/rides-step-two-post',[App\Http\Controllers\Front\HomeController::class,'post_step_two'])->name('rides.step.two.post');

Route::post('rides-confirm-post',[App\Http\Controllers\Front\HomeController::class,'confirm_ride_post'])->name('rides.confirm.post');

Route::get("/stripe-success",[App\Http\Controllers\Front\HomeController::class,'stripe_success'])->name('stripe.success');

Route::get('/thankyou-success/{ride}',[App\Http\Controllers\Front\HomeController::class,'thankyou_success'])->name('thankyou.success');

Route::post('/tracking-post',[App\Http\Controllers\Front\HomeController::class,'tracking_post'])->name('tracking.post');

Route::get('/tracking-show/{booking_no}',[App\Http\Controllers\Front\HomeController::class,'tracking_show'])->name('tracking.show');



Route::get('/tracking-ride/{id}',[App\Http\Controllers\Front\HomeController::class,'get_ride'])->name('tracking.ride');

Route::get('/print-invoice/{id}',[App\Http\Controllers\Front\HomeController::class,'print_invoice'])->name('print.invoice');



//Become Partner Form 

Route::post('/become-partner-post',[App\Http\Controllers\Front\HomeController::class,'store_become_partner'])->name('become.partner.post');

Route::post('/contact-us-post',[App\Http\Controllers\Front\HomeController::class,'sent_contact_us'])->name('contact.us.post');



//Reschedule Ride 

Route::post('/reschedule-ride/{id}',[App\Http\Controllers\Front\HomeController::class,'reschedule_ride'])->name('reschedule.ride');

Route::post('/ride-cancel/{id}',[App\Http\Controllers\Front\HomeController::class,'cancel_ride'])->name('ride.cancel');



//Safari Ride Booking



Route::post('/safari-step-one-post',[App\Http\Controllers\Front\HomeController::class,'post_safari_step_one'])->name('safari.step.one.post');

Route::get('/safari-step-two-show',[App\Http\Controllers\Front\HomeController::class,'show_safari_step_two'])->name('safari.step.two.show');

Route::post('safari-step-two-post',[App\Http\Controllers\Front\HomeController::class,'safari_step_two_post'])->name('safari.step.two.post');

Route::post('safari-booking-confirm',[App\Http\Controllers\Front\HomeController::class,'safari_booking_post'])->name('safari.booking.confirm');

Route::get("/safari-stripe-success",[App\Http\Controllers\Front\HomeController::class,'safari_stripe_success'])->name('safari.stripe.success');



Route::get('ride/track',[App\Http\Controllers\Front\HomeController::class,'ride_tracking'])->name('ride.track');



//Different Booking Pages

Route::get('/rides',function(){

    return view('front.pages.rides');

})->name('rides.page');

Route::get('/airport-rides',function(){

    return view('front.pages.airport-ride');

})->name('airport.rides.page');

Route::get('/city-tour',function(){

    return view('front.pages.city-tour');

})->name('city.tour.page');



//Specific City Tour

Route::get('/dubai-tour',function(){

    $city = "Dubai";

    return view('front.pages.dubai-tour',compact('city'));

})->name('dubai.tour.page');

Route::get('/abu-dhabi-tour',function(){

    $city = "Abu Dhabi";

    return view('front.pages.abu-dhabi-tour',compact('city'));

})->name('abudhabi.tour.page');

Route::get('/sharjah-tour',function(){

    $city = "Sharjah";

    return view('front.pages.sharjah-tour',compact('city'));

})->name('sharjah.tour.page');

Route::get('/ajam-tour',function(){

    $city = "Ajman";

    return view('front.pages.ajam-tour',compact('city'));

})->name('ajam.tour.page');

Route::get('/fujairah-tour',function(){

    $city = "Fujairah";

    return view('front.pages.fujairah-tour',compact('city'));

})->name('fujairah.tour.page');

Route::get('/ras-al-khaimah-tour',function(){

    $city = "Ras Al Khaimah";

    return view('front.pages.ras-al-khaimah-tour',compact('city'));

})->name('ras.al.khaimah.tour.page');;

Route::get('/umm-al-quwain-tour',function(){

    $city = "Um al quwaim";

    return view('front.pages.umm-al-quwain-tour',compact('city'));

})->name('umm.al.quwain.tour.page');



//Car Rentals

Route::get('/car-rentals',function(){

    return view('front.pages.car-rentals');

})->name('car.rentals');

Route::get('/full-day-luxury-chauffeur',function(){

    return view('front.pages.full-day-chauffeur');

})->name('full.day.luxury.chauffeur');



Route::get('/courier-service',function(){

    return view('front.pages.courier-service');

})->name('courier.service');

Route::get('/premium-desert-safari',function(){

    return view('front.pages.premium-desert-safari');

})->name('premium.desert.safari');

Route::get('/about-us',function(){

    return view('front.pages.about-us');

})->name('about.us');

Route::get('/faqs',function(){

    return view('front.pages.faqs');

})->name('faqs');

Route::get('/support',function(){

    return view('front.pages.support');

})->name('support');

Route::get('/contact-us',function(){

    return view('front.pages.contact-us');

})->name('contact.us');

Route::get('/booking-conditions',function(){

    return view('front.pages.booking-conditions');

})->name('booking.conditions');

Route::get('/terms',function(){

    return view('front.pages.terms');

})->name('terms');

Route::get('/privacy',function(){

    return view('front.pages.privacy');

})->name('privacy');

Route::get('/business-ride',function(){

    return view('front.pages.business-ride');

})->name('business.ride');



//Become Partner

Route::get('/become-partner',function(){

    return view('front.pages.become-partner');

})->name('become.partner');



//Corporate services

Route::get('/corporations',function(){

    $type = 'Corporations';

    // return view('front.pages.corporate-sertice');

    return view('front.pages.corporations',compact('type'));

})->name('corporate.sertice');



//Travel agencies

Route::get('/travel-agencies',function(){

    $type = 'Travel Agencies';

    return view('front.pages.travel-agencies',compact('type'));

})->name('travel.agencies');

//

Route::get('/holiday-homes',function(){

    $type = 'Holiday Homes';

    return view('front.pages.holiday-homes',compact('type'));

})->name('holiday.homes');



Route::post('travel-agencies-post',[App\Http\Controllers\Front\HomeController::class,'travel_agencies_form_post'])->name('travel.agencies.post');



//C2c partnership

// Route::get('/c2c/partnership',function(){

//     return view('front.pages.become-partner');

// })->name('become.partner');



//White label solution

Route::get('/white-label-solution',function(){

    return view('front.pages.white-label-solution');

})->name('white.label.solution');





//Ride Booking Through Guest Booking

Route::get('guest-booking',function(){

 Session::put("guest-booking",1);

 return redirect()->route('front.index');

})->name('guest.booking');



//Get Copoun Code 



// Route::get('copoun/by/code/',[App\Http\Controllers\front\HomeController::class,'get_copon_code'])->name('get.copon.code');



Route::get('/copoun-by-code/',[App\Http\Controllers\Front\HomeController::class,'get_copon_code'])->name('get.copon.code');
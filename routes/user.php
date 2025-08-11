<?php
Route::middleware(['auth', 'redirect_if_not_authenticated'])
    ->as('user.')
    ->prefix('user')
    ->group(function () {
    Route::get('/', [App\Http\Controllers\UserRideController::class, 'index'])->name('dashboard');
    // Route::get('user', [App\Http\Controllers\UserRideController::class, 'index'])->name('dashboard');
    Route::get('setting', [App\Http\Controllers\UserController::class, 'setting'])->name('user-setting');
    Route::post('update/user-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('user-updateprofile');
    Route::post('update/user-notifications', [App\Http\Controllers\UserController::class, 'updateNotifications'])->name('user-notifications');
    Route::GET('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::post('update/user-whatsapp-number', [App\Http\Controllers\UserController::class, 'updateWhatsAppNumber'])->name('user-whatsapp-number');

    Route::get('/support', [App\Http\Controllers\SupportController::class, 'index'])->name('user-support');
    
    Route::get('past-rides', [App\Http\Controllers\UserRideController::class, 'pastRides']);
    Route::post('ride/cancel', [App\Http\Controllers\UserRideController::class, 'rideCancel']);
    Route::post('ride/reschedule', [App\Http\Controllers\UserRideController::class, 'rideReschedule']);

    Route::post('support/call', [App\Http\Controllers\SupportController::class, 'callSupport']);
    Route::post('support/email', [App\Http\Controllers\SupportController::class, 'emailSupport']);

    Route::get('booking', [App\Http\Controllers\BookingController::class, 'Booking']);
    Route::get('/booking/step-{step}', [App\Http\Controllers\BookingController::class, 'showStep'])->name('form.step');
    Route::post('/booking/step/{step}', [App\Http\Controllers\BookingController::class, 'processStep'])->name('form.processStep');

//    Route::post('/apply-coupon', [CouponsController::class, 'applyCoupon'])->name('apply.coupon');

    Route::get('tour-booking', [App\Http\Controllers\TourBookingController::class, 'TourBooking']);
    Route::get('/tour-booking/step-{step}', [App\Http\Controllers\TourBookingController::class, 'showStep'])->name('tourform.step');
    Route::post('/tour-booking/step/{step}', [App\Http\Controllers\TourBookingController::class, 'processStep'])->name('tourform.processStep');
    });
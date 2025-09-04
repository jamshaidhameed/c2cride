<?php
Route::middleware(['auth', 'redirect_if_not_authenticated'])
    ->as('admin.')
    ->prefix('admin')
    ->group(function () {
        
        Route::get('/',[App\Http\Controllers\Admin\RideController::class,'bookings'])->name('dashboard');
        
        Route::match(['get', 'post'],'booking', [App\Http\Controllers\Admin\RideController::class, 'bookings']);
        Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'users']);

        Route::match(['get', 'post'],'past-rides', [App\Http\Controllers\Admin\RideController::class, 'pastRides'])->name('past-rides');
        Route::get('ride-filter-status', [App\Http\Controllers\Admin\RideController::class, 'RidesFilterByStatus'])->name('filter-status');
        Route::get('ride-filter-type', [App\Http\Controllers\Admin\RideController::class, 'RideFilterBytype'])->name('type-filter');
        Route::get('search-ride-filter', [App\Http\Controllers\Admin\RideController::class, 'RideFilterSearch'])->name('search-filter');

        Route::post('ride/action' , [App\Http\Controllers\Admin\RideController::class, 'rideAction'])->name('ride-action');
        Route::post('change/ride-status', [App\Http\Controllers\Admin\RideController::class, 'changeRideStatus'])->name('ride-status');
        Route::get('/getRideJson',[App\Http\Controllers\Admin\RideController::class,'getRideJson'])->name('get.ride.json');
        Route::get('past-ride-filter-type', [App\Http\Controllers\Admin\RideController::class, 'PastRideFilterBytype'])->name('past-type-filter');
        Route::get('past-ride-filter-status', [App\Http\Controllers\Admin\RideController::class, 'PastRidesFilterByStatus'])->name('past-filter-status');
        Route::get('past-search-ride-filter', [App\Http\Controllers\Admin\RideController::class, 'PastRideFilterSearch'])->name('past-search-filter');

        Route::get('ride-edit/{id}', [App\Http\Controllers\Admin\RideController::class, 'rideEdit'])->name('ride-edit');
        Route::post('update-booking', [App\Http\Controllers\Admin\RideController::class, 'updateBooking']);

        Route::get('get-distance', [App\Http\Controllers\Admin\RideController::class, 'getDistance'])->name('ride-distance');
        Route::get('/invoice', [App\Http\Controllers\Admin\RideController::class, 'showInvoice'])->name('invoice.show');

        //Cars CURD 
        Route::get('cars/index',[App\Http\Controllers\Admin\HomeController::class,'car_index'])->name('car.index');
        Route::get('car/create',[App\Http\Controllers\Admin\HomeController::class,'create_car'])->name('car.create');
        Route::get('cars/get/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_show'])->name('car.get');
        Route::post('/cars/store',[App\Http\Controllers\Admin\HomeController::class,'car_store'])->name('car.store');
        Route::get('car/edit/{id}',[App\Http\Controllers\Admin\HomeController::class,'edit_car'])->name('car.edit');
        Route::post('/cars/update/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_update'])->name('car.update');
        Route::get('/cars/delete/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_delete'])->name('car.delete');
        Route::get('car/delete/image/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_image_delete'])->name('car.delete.image');

        //Vehicle Pricing
        Route::get('car/pricing',[App\Http\Controllers\Admin\HomeController::class,'car_pricing'])->name('car.pricing');
        Route::post('car/pricing/store',[App\Http\Controllers\Admin\HomeController::class,'car_pricing_store'])->name('car.pricing.store');
        Route::get('car/pricing/get/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_pricing_get'])->name('car.pricing.get');
        Route::post('car/pricing/update/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_pricing_update'])->name('car.pricing.update');
        Route::get('car/pricing/delete/{id}',[App\Http\Controllers\Admin\HomeController::class,'car_pricing_delete'])->name('car.pricing.delete');

        //Hourly Booking
        Route::post('/hourly/pricing/store',[App\Http\Controllers\Admin\HomeController::class,'hourly_booking_store'])->name('hourly.pricing.store');
        Route::get('/hourly/pricing/get/{id}',[App\Http\Controllers\Admin\HomeController::class,'hourly_booking_get'])->name('hourly.pricing.get');
        Route::post('/hourly/pricing/update/{id}',[App\Http\Controllers\Admin\HomeController::class,'hourly_booking_update'])->name('hourly.pricing.update');
        Route::get('/hourly/pricing/delete/{id}',[App\Http\Controllers\Admin\HomeController::class,'hourly_booking_delete'])->name('hourly.pricing.delete');

        //City Tour Booking
        Route::post('/citytour/pricing/store',[App\Http\Controllers\Admin\HomeController::class,'city_tour_store'])->name('citytour.pricing.store');
        Route::get('/citytour/pricing/get/{id}',[App\Http\Controllers\Admin\HomeController::class,'city_tour_get'])->name('citytour.pricing.get');
        Route::post('/citytour/pricing/update/{id}',[App\Http\Controllers\Admin\HomeController::class,'city_tour_update'])->name('citytour.pricing.update');
        Route::get('/citytour/pricing/delete/{id}',[App\Http\Controllers\Admin\HomeController::class,'city_tour_delete'])->name('citytour.pricing.delete');

        //Drivers list
        Route::get('/drivers',[App\Http\Controllers\Admin\HomeController::class,'drivers_list'])->name('drivers');
        Route::get('/become/partner/list',[App\Http\Controllers\Admin\HomeController::class,'become_partner_list'])->name('become.partner.list');
        Route::get('/copoun-list',[App\Http\Controllers\Admin\HomeController::class,'coupons_list'])->name('coupon.list');
        Route::post('/copoun/store',[App\Http\Controllers\Admin\HomeController::class,'coupons_store'])->name('coupons.store');
        Route::post('/copoun-update/{id}',[App\Http\Controllers\Admin\HomeController::class,'update_coupon'])->name('coupon.update');
        Route::get('/copoun-delete/{id}',[App\Http\Controllers\Admin\HomeController::class,'coupons_delete'])->name('coupons.delete');

        //Copouns Users List 
        Route::get('/copoun/users/list',[App\Http\Controllers\Admin\HomeController::class,'copoun_users'])->name('copoun.users.list');

        //Drivers 
        Route::get('drivers/list',[App\Http\Controllers\Admin\HomeController::class,'driver_list'])->name('drivers.list');
        Route::post('driver/insert',[App\Http\Controllers\Admin\HomeController::class,'driver_insert'])->name('driver.insert');
        Route::get('driver/{id}',[App\Http\Controllers\Admin\HomeController::class,'get_driver'])->name('driver');
        Route::post('driver/update/{id}',[App\Http\Controllers\Admin\HomeController::class,'driver_update'])->name('driver.update');
        Route::get('driver/delete/{id}',[App\Http\Controllers\Admin\HomeController::class,'driver_delete'])->name('driver.delete');

        //Driver Earning 

        Route::get('earning',[App\Http\Controllers\Admin\HomeController::class,'earning_list'])->name('earning');
        Route::get('driver/rides/{driver_id}/{start_date}/{end_date}/{status}',[App\Http\Controllers\Admin\HomeController::class,'driver_rides'])->name('driver.rides');
        Route::get('driver/rides/filter',[App\Http\Controllers\Admin\HomeController::class,'driver_rides_filter'])->name('driver.rides.filter');

         //Latest Forms

         Route::get('/travel-agencies',[App\Http\Controllers\Admin\HomeController::class,'travel_agencies_data'])->name('travel-agencies');
         Route::get('/corporations',[App\Http\Controllers\Admin\HomeController::class,'corporations_data'])->name('corporations');
         Route::get('/holiday-homes',[App\Http\Controllers\Admin\HomeController::class,'holiday_homes_data'])->name('holiday-homes');

         Route::get('export-users',[App\Http\Controllers\Admin\UserController::class,'donwload_user_data'])->name('export.users');

         Route::get('/export-vendors', [App\Http\Controllers\Admin\HomeController::class, 'export_vendors'])->name('export.vendors');

         Route::get('daily-rides-report',[App\Http\Controllers\Admin\RideController::class,'daily_ride_report'])->name('daily.rides.report');

         Route::post('rides-apply-filter',[App\Http\Controllers\Admin\RideController::class,'rides_apply_filters'])->name('rides.apply.filters');

         Route::post('update-ride-informaitons',[App\Http\Controllers\Admin\RideController::class,'update_ride_informations'])->name('update.ride.informaitons');
         Route::get('/export-rides',[App\Http\Controllers\Admin\RideController::class,'ride_exports'])->name('export.rides');

         Route::get('get-activity-log/{ride_id}',[App\Http\Controllers\Admin\RideController::class,'activityLogs'])->name('user.activity.logs.list');

         //Vendors CURD

         Route::resource('vendor',App\Http\Controllers\Admin\VendorController::class);
         Route::resource('supplier',App\Http\Controllers\Admin\SupplierController::class);

         //Export Earning Data

         Route::get('export-earning-data',[App\Http\Controllers\Admin\HomeController::class,'export_earning'])->name('export-earning-data');

    });
<?php

namespace App\Http\Controllers;

use App\Mail\BookingCancel;
use App\Mail\RescheduleRequest;
use App\Models\Ride;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserRideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fields = $request->all();
        $user_id = auth()->user()->id;
        $rides = Ride::with('currency', 'coupons')->where('user_id', $user_id)->where('date_time', '>', Carbon::today())->whereNotIn('status', [1, 3]);

        if ($request->filled('booking_number')) {
            $rides = $rides->where('booking_code', $request['booking_number']);
        }

        if ($request->filled('booking_date')) {
            $rides = $rides->whereDate('date_time', Carbon::parse($request->booking_date));
        }

        if ($request->filled('booking_status')) {
            $rides = $rides->where('status', $request['booking_status']);
        }
        if ($request->filled('car_type')) {
            $rides = $rides->where('car', $request['car_type']);
        }

        if ($request->filled('search')) {
            $searchTerm = request('search'); // Get the search term from the request

            $rides->where(function ($query) use ($searchTerm) {
                $query->where('booking_code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('source', 'like', '%' . $searchTerm . '%')
                    ->orWhere('destination', 'like', '%' . $searchTerm . '%')
                    ->orWhere('car', 'like', '%' . $searchTerm . '%')
                    ->orWhere('payment_method', 'like', '%' . $searchTerm . '%');
            })->orWhereHas('rideType', function ($query) use ($searchTerm) {
                $query->where('type', 'like', '%' . $searchTerm . '%');
            })->whereNotIn('status', [1, 3]);
        }
        $rides = $rides->orderBy('date_time', 'ASC')->paginate(10);
        
        return response()->view('User.upcomingride.index', compact('rides', 'fields'));
    }

    public function pastRides(Request $request)
    {
        $fields = $request->all();

        $rides = Ride::where('user_id', auth()->id());
        $rides->where(function ($query) {
            $query->where('date_time', '<', Carbon::today());
            $query->orWhere('status', '3');
            $query->orWhere('status', '1');
        });

        if ($request->filled('booking_number')) {
            $rides = $rides->where('booking_code', $request['booking_number']);
        }

        if ($request->filled('booking_date')) {
            $rides = $rides->whereDate('date_time', Carbon::parse($request->booking_date));
        }


        if ($request->filled('car_type')) {
            $rides = $rides->where('car', $request['car_type']);
        }

        if ($request->filled('search')) {
            $searchTerm = request('search'); // Get the search term from the request

            $rides->where(function ($query) use ($searchTerm) {
                $query->where('booking_code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('source', 'like', '%' . $searchTerm . '%')
                    ->orWhere('destination', 'like', '%' . $searchTerm . '%')
                    ->orWhere('car', 'like', '%' . $searchTerm . '%')
                    ->orWhere('payment_method', 'like', '%' . $searchTerm . '%');
            })->orWhereHas('rideType', function ($query) use ($searchTerm) {
                $query->where('type', 'like', '%' . $searchTerm . '%');
            })->whereNotIn('status', [2]);
        }

        if ($request->filled('booking_status')) {
            $rides = $rides->where('status', $request['booking_status']);
        }


        $rides = $rides->orderBy('date_time', 'DESC')->paginate(10);

        return response()->view("User.pastride.index", compact('rides', 'fields'));
    }

    public function rideReschedule(Request $request)
    {
        $ride = Ride::find($request['ride_id']);

        $old_date = $ride->ride_date . ' ' . $ride->ride_time;

        Ride::where('id', $request['ride_id'])->update([
            'old_date_time' => date('Y-m-d H:i:s', strtotime($old_date)),
        ]);

        $date_time = $request['ride_date'] . ' ' . $request['ride_time'];

        Ride::where('id', $request['ride_id'])->update([
            'date_time' => date('Y-m-d H:i:s', strtotime($date_time)),
        ]);

        Ride::where('id', $request['ride_id'])->update([
            'status' => 2,
        ]);

        $ride = Ride::find($request['ride_id']);
        $user = $ride->user()->first();
        $email = new RescheduleRequest($user, $ride);
        Mail::to($user['email'])->send($email);

        return response()->json(['status' => 200, 'message' => 'Ride rescheduled successfully']);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ride $ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ride $ride)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        //
    }

    public function rideCancel(Request $request)
    {
        Ride::where('id', $request['ride_id'])->update([
            'status' => 3
        ]);

        $ride = Ride::find($request['ride_id']);
        $user = $ride->user()->first();
        $email = new BookingCancel($user, $ride);
        Mail::to($ride['email'])->send($email);
        return redirect()->back();
    }
}

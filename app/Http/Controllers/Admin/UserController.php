<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Ride;
use App\Models\User;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function users(Request $request)
    {
        $fields = $request->all();

        $usersQuery = User::withCount([
            'economyRides',
            'comfortRides',
            'businessRides',
            'suvRides',
            'exSuvRides',
            'completedRides',
            'pendingRides',
            'canceledRides',
            'confirmedRides',
        ])
            ->withSum('completedRides', 'price')
            ->where('role_id', 2);

          

            if ($request->get('filter') === 'no-rides') {
                $usersQuery->whereDoesntHave('rides');
            }

        if ($request->filled('user_id')) {
            $usersQuery->where('id', $request['user_id']);
        }

        if ($request->filled('name')) {
            $usersQuery->where('name', $request['name']);
        }
        if ($request->filled('email')) {
            $usersQuery->where('email', $request['email']);
        } 

        if ($request->filled('mobile_number')) {
            $usersQuery->where('mobile_number', $request['mobile_number']);
        }
        if ($request->filled('status')) {
            $usersQuery->where('is_verified', $request['status']);
        }

        if ($request->filled('search')) {
            $usersQuery->where(function ($query) {
                $query->where('id', 'like', '%' . request('search') . '%')
                    ->orWhere('name', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('mobile_number', 'like', '%' . request('search') . '%')
                    ->orWhere('is_verified', 'like', '%' . request('search') . '%');
            });
        }

        $users = $usersQuery->orderByDesc('id')->paginate(10);

        return view('admin.users.index', compact('users', 'fields'));
    }

    public function donwload_user_data(Request $request){
        $fields = $request->all();

        $usersQuery = User::withCount([
            'economyRides',
            'comfortRides',
            'businessRides',
            'suvRides',
            'exSuvRides',
            'completedRides',
            'pendingRides',
            'canceledRides',
            'confirmedRides',
        ])
            ->withSum('completedRides', 'price')
            ->where('role_id', 2);

          

            if ($request->get('filter') === 'no-rides') {
                $usersQuery->whereDoesntHave('rides');
            }

        if ($request->filled('user_id')) {
            $usersQuery->where('id', $request['user_id']);
        }

        if ($request->filled('name')) {
            $usersQuery->where('name', $request['name']);
        }
        if ($request->filled('email')) {
            $usersQuery->where('email', $request['email']);
        } 

        if ($request->filled('mobile_number')) {
            $usersQuery->where('mobile_number', $request['mobile_number']);
        }
        if ($request->filled('status')) {
            $usersQuery->where('is_verified', $request['status']);
        }

        if ($request->filled('search')) {
            $usersQuery->where(function ($query) {
                $query->where('id', 'like', '%' . request('search') . '%')
                    ->orWhere('name', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%')
                    ->orWhere('mobile_number', 'like', '%' . request('search') . '%')
                    ->orWhere('is_verified', 'like', '%' . request('search') . '%');
            });
        }

        $users = $usersQuery->orderByDesc('id')->get();

        // return $users;

        $file_name = 'users_export_' . now()->format('Ymd_His') . '.xlsx';
        
        return Excel::download(new UsersExport($users), $file_name);
    }

}

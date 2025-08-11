<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use Auth;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user_role = Auth::user()->role_id;

        $current_route_name = Route::currentRouteName();

        $current_route_name_exploded = explode( ".", $current_route_name );

        $current_route_name_prefix = $current_route_name_exploded[ 0 ];

        if ( $user_role == 1 ) {
            if ( $current_route_name_prefix == 2) {
                return redirect()->route( "admin.dashboard" );
            }

        } else if ( $user_role == 2 ) {
            if ( $current_route_name_prefix == 1) {
                return redirect()->route( "user.dashboard" );
            }

        } 

        return $next($request);
    }
}

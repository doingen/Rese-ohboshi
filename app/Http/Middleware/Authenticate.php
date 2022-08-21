<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {   
        if (! $request->expectsJson()) {
            if ($request->getPathInfo() == '/reserve') {
                \Session::put('reservation', [
                    'reservation_date' => $request->reservation_date,
                    'reservation_hour' => $request->reservation_hour,
                    'reservation_minute' => $request->reservation_minute,
                    'number_of_people' => $request->number_of_people]);
                return route('login.index');
            }
            else{
                return route('login.index');
            }
        }
    }
}
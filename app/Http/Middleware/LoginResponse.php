<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        // below is the existing responsen code
        // the user can be located with Auth facade
        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->route('contact');
        
    }

}
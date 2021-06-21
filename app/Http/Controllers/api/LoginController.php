<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login( Request $request)
    {
        $login = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        if( !Auth::attempt($login) )
        {
            return response(['error' => 'Invalid login credentials'], 401);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        
        return response(['user'=> Auth::user(), 'access_token' => $accessToken ]);
    }

    public function logoutApi(){ 
        if (Auth::check()) {
        $user = Auth::user()->token();
        $user->revoke();
        }
        return response('');
   }
    
}

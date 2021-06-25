<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    public function currentUser()
    {  
        return Auth::user();
    }

    public function allUsers()
    {
        $users =  User::orderBy('created_at','DESC')->get();
        return response()->json(['response' => ['status' => 'success', 'users' => $users ]]);
    }

}

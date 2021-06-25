<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\AppHttpResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{

    public function storeUser(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:80',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if( $validator->passes()){

        $data = User::create( [ 
            'name' => $request->name,
            'email' => $request->email,
            'phone' =>  $request->phone,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),                 
            ]);
        
        return AppHttpResponse::responseSuccess(
            Response::HTTP_CREATED,
            "user created successfully",
            new UserResource($data)
        );
        }
        else{
            return AppHttpResponse::responseFailure(
                Response::HTTP_BAD_REQUEST,
            [ $validator->errors() ]
            );
        }

    }

    
}

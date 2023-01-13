<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
                //set validation
                $validator = Validator::make($request->all(), [
                    'name'      => 'required',
                    'email'     => 'required|email|unique:users',
                    'password'  => 'required|string|min:8|confirmed'
                ]);
        
                //if validation fails
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 422);
                }
        
                //create user
                $user = User::create([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => bcrypt($request->password),
                    'role'      => $request->role,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'kota_lahir'=>$request->kota_lahir,
                    

                ]);
        
                //return response JSON user is created
                if($user) {
                    return response()->json([
                        'success' => true,
                        'user'    => $user,  
                    ], 201);
                }
        
                //return JSON process insert failed 
                return response()->json([
                    'token'=>$user,'access_token'=> $token,
                    'success' => false,
                ], 409);
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Validator;

class AuthController extends Controller
{

    public function sigup(Request $request)
    {
        $fields = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        if ($fields->fails()) {
            return response($fields->messages(), 201);
        } else {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => bcrypt($request['password'])
            ]);
            return response(['message' => 'sigup success'], 201);
        }


    }

    public function login(Request $request)
    {
        $fields = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($fields->fails()) {
            return response($fields->errors(), 201);
        }

        $user = User::where('email', $request['email'])->first();
        if($user == null || !Hash::check($request['password'],$user->password)){
            return response(['message'=>'invalid email or password'],401);
        }
        $token = $user->createToken('chotot')->plainTextToken ; 
        return response([
            'user' => $user,
            'token' => $token 
        ], 201);


    }

    public function test()
    {
        return response()->json('abc', 200);
    }
}
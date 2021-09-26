<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'phone_number'=>'required',
            'email'=>'required|email|unique:users|string',
            'password'=>'required|min:5|confirmed'
        ]);

        $user = User::query()->create([
            'name'=>$data['name'],
            'phone_number'=>$data['phone_number'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);

        $token = $user->createToken('pesakit-interview-token')->plainTextToken;

        $response = [
            'user'=>new UserResource($user),
            'token'=>$token
        ];

        return response($response,201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message'=>'Logged out'
        ];
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required|email|string',
            'password'=>'required|min:5'
        ]);

        //Check Email
        $user = User::query()->where('email',$data['email'])->first();

        //Check Password
        if (!$user || !Hash::check($data['password'],$user->password))
        {
            return response([
                'message'=> 'Wrong Credentials'
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('pesakit-interview-token')->plainTextToken;
        $response = [
            'user'=>new UserResource($user),
            'token'=>$token
        ];

        return response($response,201);
    }
}

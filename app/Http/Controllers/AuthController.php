<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        logger('user tentaive connect ');

        if (!Auth::attempt($request->only('email', 'password'))) {
            // dd($request->only('email', 'password'));
            return response()->json([
                'message' => 'Invalid login details2'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        logger('user_be_connected');
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }


    public function getMeEvent(Request $request)
    {
       $user = $request->user()->event;
    //    dd($user);

       return $this->handleResponse($user,"success retry");
    }
}

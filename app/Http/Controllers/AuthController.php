<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->accessToken;

            return response()->json(['token' => $token, 'user' => auth()->user()], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}

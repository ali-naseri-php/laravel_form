<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\registerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(registerRequest $request)
    {

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        if (Auth::attempt($request->all())) {
            $user = Auth::user();
            $token = $user->createToken('user')->accessToken;
            $tokenValue = $token->token;
            return Response([
                'user' => $user,
                'token' => $tokenValue

            ], 201
            );
        }
        return Response(['messige' => 'error'], 500);

    }
}

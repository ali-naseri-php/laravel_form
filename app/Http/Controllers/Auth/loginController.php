<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(LoginRequest $request)
    {

        if (!Auth::attempt($request->all()))
            return Response(['messige' => 'اطلاعات مشکل دارد']);

//        dd( Auth::createToken('MyApp')->accessToken);
        $user=Auth::user();
//        $token=Auth::user()->createToken('users')->accessToken;
        $token = $user->createToken('user')->accessToken;
        $tokenValue = $token->token;
        return Response()->json([
            'user'=>$user,

            'token'=>$tokenValue

        ],200);
//        $token = $request->createToken('MyApp')->accessToken;







    }


}

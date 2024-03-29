<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use App\Http\Requests\Auth\logRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(logRequest $request)
    {

        if (!Auth::attempt($request->all()))
            return Response(['messige' => 'اطلاعات مشکل دارد'],422);

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

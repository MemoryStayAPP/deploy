<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\UserLoginRequest;

// class LoginUserController extends Controller
// {
//     public function loginUser(UserLoginRequest $request)
//     {

//         $request->validated();

       

//         $user = User::where('email', $request->email)->first();

//         return response()->json([
//             'status' => true,
//             'message' => 'User Logged In Successfully',
//             'token' => $user->createToken("API TOKEN")->plainTextToken
//         ], 200);

//     }
// }

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller{

    public function loginUser(UserLoginRequest $request){

        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return response()->json([
                'status' => false,
                'message' => 'User Failed to login',
            ], 401);
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required', 'password' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        if (Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ])) {

            if (Auth::check()) {
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->accessToken;
                return response()->json([
                    'success' => $success,
                    'status' => 200,
                    "user_id" => $user->id,

                ], 200);
                // The user is logged in...
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
            // $des = Auth::login($user);
            // $success['token'] =  $des->createToken('MyApp')->accessToken;
            //  return response()->json(['success' => $user], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}

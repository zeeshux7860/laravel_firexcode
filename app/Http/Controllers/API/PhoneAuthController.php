<?php

namespace App\Http\Controllers\Api;

use App\PhoneAuth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneAuthController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['phone_no' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        $input = $request->all();
        $input['otp'] = rand(0, 999999);
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $input['ip_address'] = $ipaddress;
        $input['is_account'] = User::where('phone_no', $request->phone_no)->exists();
        if ($input['is_account']) {
            User::where('phone_no', $request->phone_no)->update(
                array(
                    'password' => bcrypt($input['otp'])
                )
            );
        }
        $isDone = PhoneAuth::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200,
              'is_account' => $input['is_account'],
            "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }

    }

    public function phoneVerify(Request $request)
    {
        $validator = Validator::make($request->all(), ['phone_no' => 'required', 'otp' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }

        $isDone = PhoneAuth::where('phone_no', $request->phone_no)->where('otp', $request->otp)->exists();
        if ($isDone) {
            $is_account = User::where('phone_no', $request->phone_no)->exists();
            if ($is_account) {
                if (Auth::attempt([
                    'phone_no' => request('phone_no'),
                    'password' => request('otp')
                ])) {

                    if (Auth::check()) {
                        $user = Auth::user();

                        $success['token'] =  $user->createToken('MyApp')->accessToken;
                        return response()->json([
                            'success' => $success,
                            'response_code' => 200,
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
            } else {
                return response()->json([
                    'response_code' => 404,
                    'message' => 'account not found'
                ], 404);
            }
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not fount"], 401);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'email' => 'required', 'phone_no' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }


        $input = $request->all();
        $input['otp'] = rand(0, 999999);
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $input['ip_address'] = $ipaddress;
        $input['is_account'] = true;
        $input['otp'] = rand(0, 999999);

        $isDone = PhoneAuth::create($input)->save();
        if ($isDone) {
            $inputs = $request->all();
            $inputs['password'] =  bcrypt($input['otp']);

if(User::where('phone_no',$request->phone_no)->exists()){
      return response()->json(['response_code' => 401,

                "message" => "phnone number already exists !!!"], 401);
    }
            $t =  User::create($inputs);
            if ($t) {
                return response()->json(['response_code' => 200,

                "message" => "Data submited"], 200);
            } else {
                return response()->json(['response_code' => 200, "message" => "Data not submited"], 200);
            }
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
}

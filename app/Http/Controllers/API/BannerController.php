<?php

namespace App\Http\Controllers\Api;

use App\Banner;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['image_url' => 'required', 'action_type' => 'required', 'action_name' => 'required', 'action_id' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        $input = $request->all();
        $isDone = Banner::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
    public function show()
    {
        if (Banner::exists()) {
            return response()->json(['response_code' => 200, "result" => Banner::get()], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "data not found"], 401);
        }
    }
}

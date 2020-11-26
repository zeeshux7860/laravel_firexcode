<?php

namespace App\Http\Controllers\Api;

use App\BannerVertical;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BannerVerticalController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['image_url' => 'required', 'action_type' => 'required', 'action_name' => 'required', 'action_id' => 'required', 'vertical_id' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        if(BannerVertical::where()->exists()){
            return response()->json(['response_code' => 404, "message" => "Already vertical id found"], 404);

        }
        $input = $request->all();
        $isDone = BannerVertical::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), ['vertical_id' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), ["message" => "please fill all data !!!"]], 401);
        }
        $input = $request->all();
        $isExist = BannerVertical::where('vertical_id', $request->vertical_id);
        if ($isExist->exists()) {
            return response()->json(['response_code' => 200, "result" => $isExist->get()], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "data not found"], 401);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\OrderTimeSlotList;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderTimeSlotListController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['days' => 'required', 'time_slot_id' => 'required', 'timeing' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        $input = $request->all();
        $isDone = OrderTimeSlotList::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), ['time_slot_id' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), ["message" => "please fill all data !!!"]], 401);
        }
        $input = $request->all();
        $isExist = OrderTimeSlotList::where('time_slot_id', $request->time_slot_id);
        if ($isExist->exists()) {
            return response()->json(['response_code' => 200, "result" => $isExist->get()], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "data not found"], 401);
        }
    }
}

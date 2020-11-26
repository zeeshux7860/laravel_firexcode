<?php

namespace App\Http\Controllers\Api;

use App\Order_Payment;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['order_id' => 'required', 'payment_mode' => 'required', 'transaction_id' => 'required', 'details' => 'required', 'sale_price' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        $input = $request->all();
        $isDone = Order_Payment::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
}

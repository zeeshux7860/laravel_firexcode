<?php

namespace App\Http\Controllers\Api;

use App\ProductsPrice;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductsPriceController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['product_price' => 'required', 'selling_price' => 'required', 'stock' => 'required', 'restric_quantity' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), ["message" => "please fill all data !!!"]], 401);
        }
        $input = $request->all();
        $isDone = ProductsPrice::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
}

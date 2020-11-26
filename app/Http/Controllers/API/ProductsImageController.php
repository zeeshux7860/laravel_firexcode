<?php

namespace App\Http\Controllers\Api;

use App\ProductsImage;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductsImageController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['product_id' => 'required', 'image_url' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), "message" => "please fill all data !!!"], 401);
        }
        $input = $request->all();
        $isDone = ProductsImage::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, "message" => "Data submited"], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "Data not submited"], 401);
        }
    }
}

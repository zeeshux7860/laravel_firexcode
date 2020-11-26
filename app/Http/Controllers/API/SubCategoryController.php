<?php

namespace App\Http\Controllers\Api;

use App\SubCategory;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), ['category_id' => 'required', 'category_name' => 'required', 'sub_category_name' => 'required', 'status' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), ["message" => "please fill all data !!!"]], 401);
        }
        $input = $request->all();
        $isDone = SubCategory::create($input)->save();
        if ($isDone) {
            return response()->json(['response_code' => 200, ["message" => "Data submited"]], 200);
        } else {
            return response()->json(['response_code' => 401, ["message" => "Data not submited"]], 401);
        }
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), ['category_id' => 'required']);

        if ($validator->fails()) {
            return response()->json(['response_code' => 401, 'error' => $validator->errors(), ["message" => "please fill all data !!!"]], 401);
        }
        $input = $request->all();
        $isExist = SubCategory::where('category_id', $request->category_id);
        if ($isExist->exists()) {
            return response()->json(['response_code' => 200, "result" => $isExist->get()], 200);
        } else {
            return response()->json(['response_code' => 401, "message" => "data not found"], 401);
        }
    }
}

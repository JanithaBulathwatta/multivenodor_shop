<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function loadAddProducts(){

        $categories = DB::table('categories')->get();
        return view('pages.addProduct',compact('categories'));
    }

    public function setProductCreate(Request $request){
        // dd($request->all());
        $response = ProductService::setProductCreate($request);
        return response()->json($response);
    }

    public function getProductDetails(Request $request){
        $response = ProductService::getProductDetails($request);
        return response()->json($response);
    }

    public function setProductDelete(Request $request){
        $response = ProductService::setProductDelete($request);
        return response()->json($response);
    }

}

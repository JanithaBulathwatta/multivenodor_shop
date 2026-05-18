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
}

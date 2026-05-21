<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainHomeController extends Controller
{
    public function loadShowProducts(){
        $products = DB::table('products')
                    ->where('stock_quantity', '>', 0)
                    ->where('record_status',1)
                    ->get();
        return view('pages.show-product',compact('products'));
    }
}

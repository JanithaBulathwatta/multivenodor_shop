<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainHomeController extends Controller
{
    public function loadShowProducts(Request $request){
        $searchKey = $request->serachKey;

    $query = DB::table('products')
                ->where('stock_quantity', '>', 0)
                ->where('record_status', 1);

    if($searchKey != ''){
        $query->where('product_name', 'LIKE', '%'.$searchKey.'%');
    }

    $products = $query->orderBy('id', 'desc')->get();

    if ($request->ajax()) {
        $html = view('partials.product-grid', compact('products'))->render();
        return response()->json(['html' => $html]);
    }

    return view('pages.show-product', compact('products'));
    }
}

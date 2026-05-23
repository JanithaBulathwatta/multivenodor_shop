<?php

namespace App\Http\Controllers;

use App\Services\AddToCartService;
use Illuminate\Http\Request;

class AddCartController extends Controller
{
    public function loadAddToCart(){
        return view('pages.add-to-cart');
    }

    public function setAddToCart(Request $request){
        $response = AddToCartService::setAddToCart($request);
        return response()->json($response);
    }

    public function getCartCount(Request $request){
        $response = AddToCartService::getCartCount($request);
        return response()->json($response);
    }

    public function getCartDetails(Request $request){
        $response = AddToCartService::getCartDetails($request);
        return response()->json($response);
    }

    public function setCartRemove(Request $request){
        $response = AddToCartService::setCartRemove($request);
        return response()->json($response);
    }


}

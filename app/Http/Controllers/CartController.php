<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function loadAddToCart(){
        return view('pages.add-to-cart');
    }
}

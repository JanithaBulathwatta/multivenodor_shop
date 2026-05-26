<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyItemController extends Controller
{
    public function loadBuyItem(){
        return view('pages.buy-item');
    }
}

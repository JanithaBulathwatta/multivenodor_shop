<?php

namespace App\Repository;
use App\Repository\Interfaces\AddToCartServiceInterface;

class AddToCartServiceRepository implements AddToCartServiceInterface{

    public function setAddToCart($request){
        dd($request->all());
    }

}

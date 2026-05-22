<?php

namespace App\Services;

use App\Repository\Interfaces\AddToCartServiceInterface;

class AddToCartService{

    public static function setAddToCart($request){
        $result = app()->make(AddToCartServiceInterface::class)->setAddToCart($request);
        return $result;
    }

}

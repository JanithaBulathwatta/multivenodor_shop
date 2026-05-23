<?php

namespace App\Services;

use App\Repository\Interfaces\AddToCartServiceInterface;

class AddToCartService{

    public static function setAddToCart($request){
        $result = app()->make(AddToCartServiceInterface::class)->setAddToCart($request);
        return $result;
    }

    public static function getCartCount($request){
        $result = app()->make(AddToCartServiceInterface::class)->getCartCount($request);
        return $result;
    }

    public static function getCartDetails($request){
        $result = app()->make(AddToCartServiceInterface::class)->getCartDetails($request);
        return $result;
    }

    public static function setCartRemove($request){
        $result = app()->make(AddToCartServiceInterface::class)->setCartRemove($request);
        return $result;
    }

}

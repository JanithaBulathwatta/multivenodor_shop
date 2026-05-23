<?php

namespace App\Repository\Interfaces;

interface AddToCartServiceInterface{

    public function setAddToCart($request);
    public function getCartCount($request);
    public function getCartDetails($request);
    public function setCartRemove($request);

}

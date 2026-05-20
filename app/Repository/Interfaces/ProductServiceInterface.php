<?php

namespace App\Repository\Interfaces;

interface ProductServiceInterface{

    public function setProductCreate($request);
    public function getProductDetails($request);
    public function setProductDelete($request);
    public function setProductUpdate($request);

}

<?php
namespace App\Repository;

use App\Repository\Interfaces\ProductServiceInterface;

class ProductServiceRepository implements ProductServiceInterface{

    public function setProductCreate($request){
        dd($request->all());
        $productName = $request->product_name;
        $category = $request->category_id;
        $price = $request->price;
        $stockQuantity = $request->stock_quantity;
        $description = $request->description;
        $productImage = $request->product_image;

        $imagePath = $request->file('product_image')->store('product','public');
    }


}

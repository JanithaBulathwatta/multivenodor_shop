<?php
namespace App\Repository;

use App\Repository\Interfaces\ProductServiceInterface;
use Illuminate\Support\Facades\DB;

class ProductServiceRepository implements ProductServiceInterface{

    public function setProductCreate($request){
        //dd($request->all());
        $productName = $request->product_name;
        $categoryID = $request->category_id;
        $price = $request->price;
        $stockQuantity = $request->stock_quantity;
        $description = $request->description;
        //$productImage = $request->product_image;

        $imagePath = $request->file('product_image')->store('products','public');

        DB::table('products')->insert([
            'product_name'=>$productName,
            'description'=>$description,
            'price'=>$price,
            'stock_quantity'=>$stockQuantity,
            'product_image'=>$imagePath,
            'category_id'=>$categoryID,
            'user_id'=>1
        ]);

        return[
            "status"=>200,
            "message"=>['product added succesfull']
        ];
    }

    public function getProductDetails($request){

        $resultSQL = DB::table('products')
                        ->select('id','product_name','description','price','stock_quantity','product_image','category_id')
                        ->where('record_status',1)
                        ->get();

        return[
            "status"=>200,
            "resultData"=>$resultSQL
        ];
    }

    public function setProductDelete($request){
        $productID = $request->prduct_id;

        DB::table('products')
                ->where('id',$productID)
                ->update([
                    'record_status'=>0
                ]);
        return[
            "status"=>200,
            "message"=>['user deleted sucessfully']
        ];
    }

    public function setProductUpdate($request){
        //dd($request->all());
        $newProductName = $request->updatedProductName;
        $newCategoryId = $request->updatedCategory;
        $newPrice = $request->updatedPrice;
        $newQuantity = $request->updatedQuantoty;
        $newDescription = $request->updatedDiscription;
        $newImage = $request->updatedImage;
        $productId = $request->productId;

        $oldName = $request->oldName;
        $oldPrice = $request->oldPrice;
        $oldCategory = $request->oldCategory;
        $oldQuantity = $request->oldQuantity;
        $oldDescription = $request->oldDescription;
        $oldImagePath = $request->oldImagePath;

        $imagePath = '';

        if ($request->hasFile('updatedImage')) {
            $imagePath = $request->file('updatedImage')->store('products', 'public');
        }

        if($newProductName == $oldName && $newCategoryId == $oldCategory && $newPrice == $oldPrice && $newQuantity == $oldQuantity && $newDescription == $oldDescription && $imagePath == ''){
            return[
                "status"=>400,
                "message"=>['atleast one criteria should be change']
            ];
        }

        DB::table('products')
                ->where('id',$productId)
                ->update([
                    'product_name'=>$newProductName,
                    'description'=>$newDescription,
                    'price'=>$newPrice,
                    'stock_quantity'=>$newQuantity,
                    'product_image'=>$imagePath,
                    'category_id'=>$newCategoryId
                ]);
        return[
            "status"=>200,
            "message"=>['succesfully update']
        ];

    }


}

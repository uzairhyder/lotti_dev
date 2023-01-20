<?php

use Illuminate\Support\Arr;
use App\Models\BackendModels\Brand;
use Illuminate\Support\Facades\Auth;
use App\Models\BackendModels\Product;
use App\Models\BackendModels\SubCategory;
use App\Models\OrderNotification;

function search(){
    $products =  Product::where('status',1)->get();
    
    
    $search_products = array();
    
    // extract product title
    foreach($products as $product){
        $arr = $product->product_name;
        if(!empty($product->product_name)){
            array_push($search_products, $product->product_name);
        }
    }


    // extract product tags
    foreach($products as $product){
        
        if(!empty($product->tags)){

            $array_tags = json_decode($product->tags);
            
            if(count($array_tags) > 0){
                for($x = 0; $x < count($array_tags); $x++){
                    
                    if($array_tags[$x] != null){
                        array_push($search_products, $array_tags[$x]);

                    }
                }
            }
        }
    }



    // extract product tags
    $product_categories = SubCategory::where('status',1)->withCount('products')->with('products')->has('products', '>' , 0)->get();
    foreach($product_categories as $product_category){
        
        if(!empty($product_category->sub_category_name)){
            array_push($search_products, $product_category->sub_category_name);
        }
    }



    // extract product tags
    $product_brands = Brand::where('status',1)->withCount('products')->with('products')->has('products', '>' , 0)->get();
    foreach($product_brands as $product_brand){
        
        if(!empty($product_brand->brand_name)){
            array_push($search_products, $product_brand->brand_name);
        }
    }


    // array_filter($search_products)
    return $search_products;

}




    // admin header
    function order_notification()
    {
        
       $order_notification = OrderNotification::all();
        return $order_notification;
    }


?>
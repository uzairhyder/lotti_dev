<?php

namespace App\Models\BackendModels;

use App\Models\ProductAttribute;
use App\Models\ProductVariantion;
use App\Models\FrontendModels\Order;
use App\Models\FrontendModels\Review;
use App\Models\BackendModels\Shipping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;
    public function get_parent_category(){
        return $this->belongsTo(ParentCategory::class,'parent_category_id');
    }
    public function get_main_category(){
        return $this->belongsTo(MainCategory::class,'main_category_id');
    }
    public function get_sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function get_brand_name(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function order(){
        return $this->hasOne(Order::class,'product_id')->withDefault();
    }
    
    public function attributes(){
        return $this->hasMany(Attribute::class,'product_id')->orderBy('product_id','asc');
    }

    public function get_ratings(){
        return $this->hasMany(Review::class,'product_id');
    }
    
    
    public function product_variants(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    
    
    public function product_attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    
    public function product_variations(){
        return $this->hasMany(ProductVariantion::class,'product_id');
    }
   
   
    // where not null variable product
    public function product_variable(){
        return $this->hasMany(ProductAttribute::class,'product_id')->where('used_for_variation', '!=', null);
    }


    public function product_variations_filter(){
        return $this->hasMany(ProductVariantion::class,'product_id');
    }
    
    
    public function product_shipping(){
        return $this->belongsTo(Shipping::class,'shipping');
    }

}

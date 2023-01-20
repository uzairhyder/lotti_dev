<?php

namespace App\Models;

use App\Models\BackendModels\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariantion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
}

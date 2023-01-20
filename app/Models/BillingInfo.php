<?php

namespace App\Models;

use App\Models\ProductVariantion;
use App\Models\BackendModels\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackendModels\Cancellation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingInfo extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function variations()
    {
        return $this->hasOne(ProductVariantion::class, 'id', 'product_variantion_id');
    }

    public function get_reason()
    {
        return $this->belongsTo(Cancellation::class, 'cancellation_reason');
    }
}

<?php

namespace App\Models\BackendModels;

use App\Models\FrontendModels\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    use HasFactory;

    public function ordernotes(){
        return $this->hasMany(Order::class,'id','order_id');
    }
}

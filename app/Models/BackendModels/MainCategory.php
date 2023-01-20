<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    public function get_parent_category(){
        return $this->belongsTo(ParentCategory::class,'parent_category_id');
    }
    
    public function sub_category(){
        return $this->hasOne(SubCategory::class,'main_category_id');
    }

    public function get_sub_cat(){
        return $this->hasMany(SubCategory::class);
    }

    public function sub_categories(){
        return $this->hasMany(SubCategory::class, 'id');
    }
    
}

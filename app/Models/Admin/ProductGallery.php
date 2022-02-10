<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    public function Color(){
        return $this->belongsTo(ColorManage::class,'color_id','id');
    }
    public function Product(){
        return $this->belongsTo(ProductManage::class,'pro_id','id');
    }
}

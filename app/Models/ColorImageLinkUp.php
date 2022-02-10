<?php

namespace App\Models;

use App\Models\Admin\ColorManage;
use App\Models\Admin\ProductManage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorImageLinkUp extends Model
{
    use HasFactory;

    public function Color(){
        return $this->belongsTo(ColorManage::class,'color_id','id');
    }
    public function Product(){
        return $this->belongsTo(ProductManage::class,'pro_id','id');
    }
}

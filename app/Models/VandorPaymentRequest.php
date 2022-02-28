<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VandorPaymentRequest extends Model
{
    use HasFactory;

    public function VandorInof(){

        return $this->belongsTo(Vandor::class,'user_id','id');
    }

    protected $with=['VandorInof'];
}

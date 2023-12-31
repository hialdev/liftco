<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use HasFactory;
    use Resizable;
    protected $table = "products";

    public function getType(){
        return $this->hasOne(ProductType::class,'id','id_product_type');
    }

}

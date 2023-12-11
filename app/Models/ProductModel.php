<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    public function productTypes()
    {
        return $this->hasMany(ProductType::class, 'id_product_model', 'id');
    }
}

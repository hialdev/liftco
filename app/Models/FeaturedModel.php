<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedModel extends Model
{
    use HasFactory;
    protected $table = 'top_model';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'featured_model_pivot', 'id_topmodel', 'id_product')
                    ->orderBy('rating', 'desc');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedCategory extends Model
{
    use HasFactory;
    protected $table = 'top_category';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'featured_category_pivot', 'id_topcategory', 'id_product')
                    ->orderBy('rating', 'desc');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'id_category');
    }
}

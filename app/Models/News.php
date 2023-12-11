<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class News extends Model
{
    use HasFactory;
    use Resizable;

    protected $table = "news";

    public function categories(){
        return $this->belongsToMany(NewsCategory::class,'pivot_news_category','id_news','id_news_category');
    }
}

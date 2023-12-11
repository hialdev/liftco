<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Value extends Model
{
    use HasFactory;
    use Resizable;

    protected $table = 'values';
}

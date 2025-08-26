<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class official extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'url', // إضافة رابط المدونة ليتم الحفظ والتحديث
    ];
}

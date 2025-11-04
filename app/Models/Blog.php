<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * 🧩 الحقول المسموح تعبئتها جماعيًا (mass assignment)
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'url',
        'fb_post_id',
        'source',
        'published_at',
    ];

    /**
     * 🕓 التحويل التلقائي للحقول الزمنية
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];
}

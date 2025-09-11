<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    // الأعمدة المسموح بملئها مباشرة
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'page',
        'visited_at',
    ];

    // تحويل visited_at تلقائياً إلى كائن تاريخ
    protected $casts = [
        'visited_at' => 'datetime',
    ];

    /**
     * العلاقة مع المستخدم (اختياري إذا عندك جدول users)
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

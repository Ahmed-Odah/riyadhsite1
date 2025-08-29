<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedCoin extends Model
{
    protected $fillable = [
        'coin_id',
        'title',
        'description',
        'image',       // الوجه
        'back_image',  // ✅ أضفنا الظهر
    ];

    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}

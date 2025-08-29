<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'back_image', // أضف هذا العمود
        'country',
    ];

    // علاقة لجلب العملات المرتبطة
    public function relatedCoins()
    {
        return $this->hasMany(RelatedCoin::class);
    }
}

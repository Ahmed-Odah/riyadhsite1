<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // الأعمدة المسموح إدخالها مباشرة
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}

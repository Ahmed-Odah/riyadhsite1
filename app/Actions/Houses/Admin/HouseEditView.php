<?php

namespace App\Actions\Houses\Admin;

use App\Models\house;
use Lorisleiva\Actions\Concerns\AsAction;

class HouseEditView
{
    use AsAction;

    public function handle($id)  // 👈 استقبل الـ id
    {
        $house = house::findOrFail($id); // 👈 عنصر واحد فقط
        return view('house.admin.edit' , compact('house'));
    }

}

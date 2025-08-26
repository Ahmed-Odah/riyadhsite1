<?php

namespace App\Actions\Houses\Admin;
use App\Models\house;

use Lorisleiva\Actions\Concerns\AsAction;

class HouseAdminIndex
{
    use AsAction;

    public function handle()
    {
        $houses = house::query()->get();
        return view('house.admin.index' , compact('houses'));
    }
}

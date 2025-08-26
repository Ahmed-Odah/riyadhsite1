<?php

namespace App\Actions\Houses\Client;
use App\Models\house;

use Lorisleiva\Actions\Concerns\AsAction;

class HouseClientAction
{
    use AsAction;

    public function handle()
    {
        $houses = house::query()->get();
        return view('house.client.house', compact('houses'));
    }
}

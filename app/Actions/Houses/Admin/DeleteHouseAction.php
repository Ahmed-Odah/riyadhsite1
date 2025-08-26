<?php

namespace App\Actions\Houses\Admin;

use App\Models\house;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteHouseAction
{
    use AsAction;

    public function handle(house $house)
    {
        $house->delete();
        return back();
    }
}

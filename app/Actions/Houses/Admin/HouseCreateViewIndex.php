<?php

namespace App\Actions\Houses\Admin;

use Lorisleiva\Actions\Concerns\AsAction;

class HouseCreateViewIndex
{
    use AsAction;

    public function handle()
    {
        return view('house.admin.create');
    }
}

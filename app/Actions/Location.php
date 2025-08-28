<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class Location
{
    use AsAction;

    public function handle()
    {
        return view('location.location');
    }
}

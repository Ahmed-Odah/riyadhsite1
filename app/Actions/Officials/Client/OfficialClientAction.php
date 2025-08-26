<?php

namespace App\Actions\Officials\Client;
use App\Models\official;

use Lorisleiva\Actions\Concerns\AsAction;

class OfficialClientAction
{
    use AsAction;

    public function handle()
    {
        $officials = official::query()->get();
        return view('official.client.pool', compact('officials'));
    }
}

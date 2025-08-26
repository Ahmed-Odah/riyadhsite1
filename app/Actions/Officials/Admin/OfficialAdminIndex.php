<?php

namespace App\Actions\Officials\Admin;
use App\Models\official;

use Lorisleiva\Actions\Concerns\AsAction;

class OfficialAdminIndex
{
    use AsAction;

    public function handle()
    {
        $officials = official::query()->get();
        return view('official.admin.index' , compact('officials'));
    }
}

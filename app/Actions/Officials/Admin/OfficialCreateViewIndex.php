<?php

namespace App\Actions\Officials\Admin;

use Lorisleiva\Actions\Concerns\AsAction;

class OfficialCreateViewIndex
{
    use AsAction;

    public function handle()
    {
        return view('official.admin.create');
    }
}

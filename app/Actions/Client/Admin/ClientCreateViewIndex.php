<?php

namespace App\Actions\Client\Admin;

use Lorisleiva\Actions\Concerns\AsAction;

class ClientCreateViewIndex
{
    use AsAction;

    public function handle()
    {
        return view('client.admin.create');
    }
}

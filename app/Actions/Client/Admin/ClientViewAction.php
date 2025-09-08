<?php

namespace App\Actions\Client\Admin;

use Lorisleiva\Actions\Concerns\AsAction;

class ClientViewAction
{
    use AsAction;

    public function handle()
    {
        return view('client.admin.reg');
    }
}

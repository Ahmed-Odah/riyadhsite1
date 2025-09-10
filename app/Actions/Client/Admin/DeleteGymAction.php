<?php

namespace App\Actions\Client\Admin;

use App\Models\Client;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteClientAction
{
    use AsAction;

    public function handle(Client $client)
    {
        $client->delete();
        return back()->with('success', '✅ تم حذف العميل بنجاح');
    }
}

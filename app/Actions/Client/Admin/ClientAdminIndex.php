<?php

namespace App\Actions\Client\Admin;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Client;

class ClientAdminIndex
{
    use AsAction;

    public function handle()
    {
        // استرجاع كل العملاء
        return Client::all();
    }

    // إذا أردت يمكن إضافة طريقة لتوليد عرض مباشرة
    public function asController()
    {
        $clients = $this->handle();
        return view('client.admin.index', compact('clients'));
    }
}

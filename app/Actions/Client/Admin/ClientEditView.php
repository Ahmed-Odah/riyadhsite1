<?php

namespace App\Actions\Client\Admin;

use App\Models\Client;
use Lorisleiva\Actions\Concerns\AsAction;

class ClientEditView
{
    use AsAction;

    public function handle($id)  // 👈 استقبل الـ id
    {
        $client = Client::findOrFail($id); // ✅ جلب العميل المحدد
        return view('client.admin.edit', compact('client')); // ✅ صفحة تعديل العميل
    }
}

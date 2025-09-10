<?php

namespace App\Actions\Client\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class ClientPostAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // إنشاء عميل جديد
        Client::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'phone'    => $request->get('phone'),
            'address'  => $request->get('address'),
        ]);

        // ✅ رجوع مع رسالة نجاح
        return redirect()->back()->with('success', '✅ تم إرسال البيانات بنجاح!');
    }
}

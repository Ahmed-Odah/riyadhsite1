<?php

namespace App\Actions\Client\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class ClientPostAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // إنشاء عميل جديد مع كلمة المرور
        Client::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'phone'    => $request->get('phone'),
            'address'  => $request->get('address'),
        ]);

        return back(); // أو redirect لصفحة قائمة العملاء
    }
}

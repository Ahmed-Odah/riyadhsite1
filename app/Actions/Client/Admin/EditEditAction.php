<?php

namespace App\Actions\Client\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class EditClientAction
{
    use AsAction;

    public function handle(Request $request, Client $client)
    {
        $data = [
            'name'    => $request->get('name'),
            'email'   => $request->get('email'),
            'phone'   => $request->get('phone'),
            'address' => $request->get('address'),
        ];

        // ✅ إذا فيه كلمة مرور جديدة، نعمل تحديث مع تشفيرها
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->get('password'));
        }

        $client->update($data);

        return redirect()->route('client-index')->with('success', '✅ تم تحديث بيانات العميل بنجاح');
    }
}

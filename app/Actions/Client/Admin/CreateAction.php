<?php

namespace App\Actions\Client\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // ✅ التحقق من البيانات
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:clients,email',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Client::create([
                'name'     => $request->get('name'),
                'email'    => $request->get('email'),
                'phone'    => $request->get('phone'),
                'address'  => $request->get('address'),
                'password' => Hash::make($request->get('password')),
            ]);

            return back()->with('success', '✅ تم إضافة العميل بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ في إضافة العميل: ' . $e->getMessage());
            return back()->with('error', '❌ حدث خطأ أثناء إضافة العميل، يرجى المحاولة مرة أخرى.');
        }
    }
}

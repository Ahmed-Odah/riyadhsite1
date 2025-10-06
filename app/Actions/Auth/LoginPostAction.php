<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginPostAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // محاولة تسجيل الدخول
        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            $user = Auth::user(); // المستخدم المؤكد بعد تسجيل الدخول

            // تحويل حسب نوع المستخدم
            if($user->type == 0) {
                return redirect()->route('homepage');
            } else if($user->type == 1) {
                return redirect()->route('dashboard');
            }
        }

        // في حالة فشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
        ]);
    }
}

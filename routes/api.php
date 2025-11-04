<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Actions\Blog\BlogCreateAction;

Route::post('/blog-auto', function (Request $request) {
    // 🔐 تحقق من التوكن (مفتاح الأمان)
    $token = $request->header('X-Webhook-Token');
    abort_unless($token === env('FB_WEBHOOK_TOKEN'), 401, 'Unauthorized');

    // ✅ استدعاء الأكشن بشكل مباشر
    $action = app(BlogCreateAction::class);

    // ✅ تأكد أن الأكشن يحتوي على الدالة handleFromFacebook
    return $action->handleFromFacebook($request);
});

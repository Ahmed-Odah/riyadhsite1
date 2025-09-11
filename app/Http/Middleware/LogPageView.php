<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PageView;

class LogPageView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تخزين بيانات الزيارة في قاعدة البيانات
        PageView::create([
            'user_id'    => auth()->check() ? auth()->id() : null, // يسجل المستخدم إذا كان مسجل دخول
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(), // الرابط الكامل مع البراميترز
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}

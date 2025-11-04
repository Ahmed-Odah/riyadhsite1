<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // ✅ تعريف ملف api.php
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // ✅ تعريف ملف web.php
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}

<?php

namespace App\Actions\dashboard;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\PageView;
use Illuminate\Support\Facades\DB;

class IndexAction
{
    use AsAction;

    public function handle()
    {
        $totalViews = PageView::count();

        $todayViews = PageView::whereDate('visited_at', today())->count();

        $uniqueToday = PageView::whereDate('visited_at', today())
            ->distinct('ip_address')
            ->count('ip_address');

        $topPages = PageView::select('page', DB::raw('COUNT(*) as cnt'))
            ->groupBy('page')
            ->orderByDesc('cnt')
            ->take(5)
            ->get();

        return compact('totalViews', 'todayViews', 'uniqueToday', 'topPages');
    }

    // يسمح باستدعاء الأكشن مباشرة كـ Route action
    public function asController()
    {
        return view('admin.dashboard.index', $this->handle());
    }
}

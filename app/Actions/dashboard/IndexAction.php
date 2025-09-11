<?php

namespace App\Actions\Dashboard;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Client;
use App\Models\PageView;

class IndexAction
{
    use AsAction;

    public function handle()
    {
        return [
            // 🧑‍🤝‍🧑 إحصائيات العملاء
            'total_clients'   => Client::count(),
            'new_clients'     => Client::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count(),
            'latest_client'   => Client::latest()->first(),

            // 👀 إحصائيات الزيارات
            'total_visits'    => PageView::count(),
            'visits_today'    => PageView::whereDate('visited_at', today())->count(),
            'unique_visitors' => PageView::distinct('ip_address')->count('ip_address'),
            'latest_visit'    => PageView::latest('visited_at')->first(),
        ];
    }

    public function asController()
    {
        $stats = $this->handle();

        return view('client2.index', compact('stats'));
    }
}

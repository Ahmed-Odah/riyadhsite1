@extends('admin.layout.dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-gradient-to-tr from-green-700 to-green-500 text-white rounded-2xl p-6 shadow-lg">
        <h3 class="text-sm">إجمالي الزيارات</h3>
        <p class="text-3xl font-bold mt-2">{{ $totalViews }}</p>
    </div>

    <div class="bg-gradient-to-tr from-blue-700 to-blue-500 text-white rounded-2xl p-6 shadow-lg">
        <h3 class="text-sm">زيارات اليوم</h3>
        <p class="text-3xl font-bold mt-2">{{ $todayViews }}</p>
        <small>زوار فريدون اليوم: {{ $uniqueToday }}</small>
    </div>

    <div class="bg-gradient-to-tr from-purple-700 to-purple-500 text-white rounded-2xl p-6 shadow-lg">
        <h3 class="text-sm">أهم الصفحات</h3>
        <ul class="mt-2">
            @foreach($topPages as $p)
                <li class="text-sm">{{ $p->page }} — {{ $p->cnt }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

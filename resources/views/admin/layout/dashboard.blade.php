<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

    {{-- خطوط Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    {{-- أيقونة الموقع --}}
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('resha.png') }}">

    <title>لوحة التحكم</title>
    @vite('resources/css/app.css')
</head>

<body class="font-[Tajawal] bg-gray-100">

{{-- الحاوية الرئيسية للجوال --}}
<div class="flex flex-col w-full min-h-screen">

    {{-- الهيدر --}}
    <div class="w-full">
        @include('admin.layout.header')
    </div>

    {{-- الشريط الجانبي يظهر أسفل الهيدر على الجوال --}}
    <div class="w-full">
        @include('admin.layout.sidebar')
    </div>

    {{-- محتوى الصفحة --}}
    <div class="flex-1 p-4">
        @yield('content')
    </div>

</div>

{{-- شاشة الترحيب --}}
@if(isset($showWelcome) && $showWelcome)
    <div id="welcomeModal" class="fixed inset-0 flex items-center justify-center z-50 px-4" style="background-color: rgba(0, 0, 0, 0.80);">
        <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-sm text-center animate-fade-in">
            <img src="{{ asset('resha.png') }}" alt="logo" class="w-16 mx-auto mb-4">
            <h1 class="text-xl font-bold mb-2">مرحباً بك دكتور رياض 👋</h1>
            <p class="text-gray-600 text-sm mb-6">
                لقد دخلت إلى <span class="font-semibold text-blue-600">لوحة التحكم</span>
            </p>
            <button onclick="closeWelcome()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                دخول
            </button>
        </div>
    </div>
@endif

<script>
    function closeWelcome() {
        const modal = document.getElementById('welcomeModal');
        if(modal) modal.style.display = 'none';
    }

    setTimeout(closeWelcome, 4000);
</script>

<style>
    @keyframes fadeIn {
        from {opacity: 0; transform: scale(0.95);}
        to {opacity: 1; transform: scale(1);}
    }
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out;
    }
</style>

</body>
</html>

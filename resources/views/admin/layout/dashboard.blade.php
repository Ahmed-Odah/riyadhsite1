<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- أيقونة -->
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('resha.png') }}">

    <title>لوحة التحكم</title>
    @vite('resources/css/app.css')
</head>

<body class="font-[Tajawal]">

<div class="flex h-screen">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
</div>

{{-- شاشة الترحيب تظهر فقط على صفحة Dashboard --}}
{{-- شاشة الترحيب تظهر فقط على صفحة Dashboard --}}
@if(isset($showWelcome) && $showWelcome)
    <div id="welcomeModal" class="fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.80);">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md text-center animate-fade-in">
            <img src="{{ asset('resha.png') }}" alt="logo" class="w-20 mx-auto mb-4">
            <h1 class="text-2xl font-bold mb-2">مرحباً بك دكتور رياض 👋</h1>
            <p class="text-gray-600 mb-6">
                لقد دخلت إلى <span class="font-semibold text-blue-600">لوحة التحكم</span>
            </p>
            <button onclick="closeWelcome()"
                    class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                دخول
            </button>
        </div>
    </div>
@endif


<script>
    function closeWelcome() {
        document.getElementById('welcomeModal').style.display = 'none';
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

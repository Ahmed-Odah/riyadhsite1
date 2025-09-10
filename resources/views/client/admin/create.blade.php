@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow text-right">

        {{-- ✅ إشعار النجاح --}}
        @if(session('success'))
            <div
                id="successAlert"
                class="fixed top-5 right-5 max-w-sm w-full bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-slide-in"
                style="animation-fill-mode: forwards;"
                dir="rtl"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-semibold">✅ تم حفظ العميل بنجاح!</span>
            </div>

            <style>
                @keyframes slide-in {
                    0% {opacity: 0; transform: translateX(100%);}
                    100% {opacity: 1; transform: translateX(0);}
                }
                @keyframes slide-out {
                    0% {opacity: 1; transform: translateX(0);}
                    100% {opacity: 0; transform: translateX(100%);}
                }
                .animate-slide-in {animation: slide-in 0.5s ease forwards;}
                .animate-slide-out {animation: slide-out 0.5s ease forwards;}
            </style>

            <script>
                setTimeout(() => {
                    const alert = document.getElementById('successAlert');
                    alert.classList.remove('animate-slide-in');
                    alert.classList.add('animate-slide-out');
                    alert.addEventListener('animationend', () => alert.remove());
                }, 3000);
            </script>
        @endif

        {{-- إشعار الخطأ --}}
        @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded text-center shadow">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold mb-6">➕ إضافة عميل جديد</h2>

        <form action="{{ route('client-create-view') }}" method="POST">
            @csrf

            {{-- الاسم --}}
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">الاسم الكامل</label>
                <input dir="rtl" type="text" id="name" name="name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            {{-- البريد الإلكتروني --}}
            <div class="mb-4">
                <label for="email" class="block mb-1 font-medium">البريد الإلكتروني</label>
                <input dir="rtl" type="email" id="email" name="email"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            {{-- الهاتف --}}
            <div class="mb-4">
                <label for="phone" class="block mb-1 font-medium">رقم الهاتف</label>
                <input dir="rtl" type="text" id="phone" name="phone"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- العنوان --}}
            <div class="mb-4">
                <label for="address" class="block mb-1 font-medium">العنوان</label>
                <input dir="rtl" type="text" id="address" name="address"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- كلمة المرور --}}
            <div class="mb-6">
                <label for="password" class="block mb-1 font-medium">كلمة المرور</label>
                <input dir="rtl" type="password" id="password" name="password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition w-full">
                    💾 حفظ العميل
                </button>
            </div>
        </form>
    </div>
@endsection

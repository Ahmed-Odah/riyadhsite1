@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow text-right">

        {{-- إشعار النجاح --}}
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
                <span class="font-semibold">تم حفظ الكتاب بنجاح!</span>
            </div>

            <style>
                @keyframes slide-in {
                    0% {
                        opacity: 0;
                        transform: translateX(100%);
                    }
                    100% {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }
                @keyframes slide-out {
                    0% {
                        opacity: 1;
                        transform: translateX(0);
                    }
                    100% {
                        opacity: 0;
                        transform: translateX(100%);
                    }
                }
                .animate-slide-in {
                    animation: slide-in 0.5s ease forwards;
                }
                .animate-slide-out {
                    animation: slide-out 0.5s ease forwards;
                }
            </style>

            <script>
                // بعد 3 ثواني تبدأ الانيميشن للخروج ثم تختفي العنصر
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

        <h2 class="text-2xl font-bold mb-6">إضافة كتاب جديد</h2>

        <form action="{{ route('book-post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block mb-1 font-medium">عنوان الكتاب</label>
                <input dir="rtl" type="text" id="title" name="title"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-1 font-medium">وصف الكتاب</label>
                <textarea dir="rtl" id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                          required></textarea>
            </div>

            <div class="mb-4">
                <label for="pdf" class="block mb-1 font-medium">ملف PDF</label>
                <input dir="rtl" type="file" id="cover_url" name="cover_url" accept="application/pdf"
                       class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-6">
                <label for="image" class="block mb-1 font-medium">صورة الغلاف</label>
                <input dir="rtl" type="file" id="image" name="image" accept="image/*"
                       class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition w-full">
                    حفظ الكتاب
                </button>
            </div>
        </form>
    </div>
@endsection

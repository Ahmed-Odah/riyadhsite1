@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-3xl mx-auto mt-8 bg-white p-8 rounded-3xl shadow-xl text-right">

        {{-- إشعار النجاح --}}
        @if(session('success'))
            <div id="successAlert" class="fixed top-5 right-5 max-w-sm w-full bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-slide-in" style="animation-fill-mode: forwards;" dir="rtl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-semibold">تم حفظ العملة بنجاح!</span>
            </div>
        @endif

        {{-- إشعار الخطأ --}}
        @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded text-center shadow">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center">إضافة عملة جديدة</h2>

        <form action="{{ route('coin-create') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- بيانات العملة الرئيسية --}}
            <div class="space-y-2">
                <label for="title" class="block text-lg font-medium text-gray-700">عنوان العملة</label>
                <input dir="rtl" type="text" id="title" name="title"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                       required>
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-lg font-medium text-gray-700">وصف العملة</label>
                <textarea dir="rtl" id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                          required></textarea>
            </div>

            <div class="space-y-2">
                <label for="country" class="block text-lg font-medium text-gray-700">الدولة</label>
                <input dir="rtl" type="text" id="country" name="country"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                       placeholder="مثال: السعودية" required>
            </div>

            {{-- صورة الوجه --}}
            <div class="space-y-2">
                <label for="image" class="block text-lg font-medium text-gray-700">صورة وجه العملة</label>
                <input dir="rtl" type="file" id="image" name="image" accept="image/*"
                       class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition"
                       required>
            </div>

            {{-- صورة الظهر --}}
            <div class="space-y-2">
                <label for="back_image" class="block text-lg font-medium text-gray-700">صورة ظهر العملة</label>
                <input dir="rtl" type="file" id="back_image" name="back_image" accept="image/*"
                       class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition">
            </div>

            {{-- العملات المشابهة --}}
            <h3 class="text-xl font-semibold mb-4 mt-6 text-gray-800">العملات المشابهة (اختياري)</h3>
            <div id="related-coins-wrapper" class="space-y-4">
                <div class="related-coin bg-gray-50 border border-gray-200 rounded-2xl p-4 shadow-sm relative">
                    <button type="button" class="remove-related absolute top-2 left-2 text-red-500 hover:text-red-700 hidden">✖</button>
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">عنوان العملة المشابهة</label>
                            <input type="text" name="related_title[]" class="w-full border border-gray-300 rounded-xl px-3 py-2" placeholder="مثال: ريال قطري">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">صورة الوجه للعملة المشابهة</label>
                            <input type="file" name="related_image[]" accept="image/*" class="w-full border border-gray-300 rounded-xl px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">صورة الظهر للعملة المشابهة</label>
                            <input type="file" name="related_back_image[]" accept="image/*" class="w-full border border-gray-300 rounded-xl px-3 py-2">
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" id="add-related-coin"
                    class="mt-4 mb-6 bg-blue-500 text-white px-5 py-2 rounded-xl hover:bg-blue-600 transition w-full">
                + إضافة عملة مشابهة
            </button>

            <div>
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition w-full font-semibold">
                    حفظ العملة
                </button>
            </div>
        </form>
    </div>

    {{-- جافاسكريبت لإضافة/حذف حقول جديدة --}}
    <script>
        document.getElementById('add-related-coin').addEventListener('click', function () {
            const wrapper = document.getElementById('related-coins-wrapper');
            const newField = document.createElement('div');
            newField.classList.add('related-coin', 'bg-gray-50', 'border', 'border-gray-200', 'rounded-2xl', 'p-4', 'shadow-sm', 'relative', 'mt-4');
            newField.innerHTML = `
            <button type="button" class="remove-related absolute top-2 left-2 text-red-500 hover:text-red-700">✖</button>
            <div class="flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">عنوان العملة المشابهة</label>
                    <input type="text" name="related_title[]" class="w-full border border-gray-300 rounded-xl px-3 py-2" placeholder="مثال: دينار بحريني">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">صورة الوجه للعملة المشابهة</label>
                    <input type="file" name="related_image[]" accept="image/*" class="w-full border border-gray-300 rounded-xl px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">صورة الظهر للعملة المشابهة</label>
                    <input type="file" name="related_back_image[]" accept="image/*" class="w-full border border-gray-300 rounded-xl px-3 py-2">
                </div>
            </div>
        `;
            wrapper.appendChild(newField);

            newField.querySelector('.remove-related').addEventListener('click', function () {
                newField.remove();
            });
        });

        document.querySelectorAll('.remove-related').forEach(btn => {
            btn.addEventListener('click', function () {
                btn.parentElement.remove();
            });
        });
    </script>
@endsection

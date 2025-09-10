<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>تسجيل عميل</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f9fafb 0%, #e5e7eb 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
</head>
<body>

<form action="{{ route('client.post') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-lg max-w-md w-full">
    @csrf
    <h2 class="text-2xl font-extrabold mb-8 text-center text-gray-800">تسجيل بيانات العميل</h2>

    {{-- عرض الأخطاء --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 p-4 rounded-xl text-sm">
            <ul class="list-disc pr-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- الاسم -->
    <div class="mb-6">
        <label for="name" class="block mb-2 font-semibold text-gray-800 text-right">الاسم الكامل</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
            placeholder="أدخل اسمك الكامل"
            class="w-full px-5 py-3 rounded-xl border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-gray-900"
        />
    </div>

    <!-- البريد -->
    <div class="mb-6">
        <label for="email" class="block mb-2 font-semibold text-gray-800 text-right">البريد الإلكتروني</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="example@domain.com"
            class="w-full px-5 py-3 rounded-xl border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-gray-900"
        />
    </div>

    <!-- الجوال -->
    <div class="mb-6">
        <label for="phone" class="block mb-2 font-semibold text-gray-800 text-right">رقم الجوال</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone') }}"
            required
            placeholder="05xxxxxxxx"
            class="w-full px-5 py-3 rounded-xl border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-gray-900"
        />
    </div>

    <!-- العنوان -->
    <div class="mb-8">
        <label for="address" class="block mb-2 font-semibold text-gray-800 text-right">العنوان</label>
        <input
            type="text"
            id="address"
            name="address"
            value="{{ old('address') }}"
            placeholder="المدينة، الحي"
            class="w-full px-5 py-3 rounded-xl border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-gray-900"
        />
    </div>

    <!-- زر -->
    <button
        type="submit"
        class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition-colors duration-300 shadow-md"
    >
        حفظ البيانات
    </button>
</form>

</body>
</html>

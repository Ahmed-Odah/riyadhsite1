@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow text-right">
        <h2 class="text-2xl font-bold mb-6">✏️ تعديل العميل</h2>

        <form action="{{ route('client-update', $client->id) }}" method="POST">
            @csrf
            {{-- ممكن تضيف @method('PUT') إذا تحب تعمل RESTful --}}

            {{-- الاسم --}}
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">الاسم الكامل</label>
                <input dir="rtl" value="{{ $client->name }}" type="text" id="name" name="name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            {{-- البريد الإلكتروني --}}
            <div class="mb-4">
                <label for="email" class="block mb-1 font-medium">البريد الإلكتروني</label>
                <input dir="rtl" value="{{ $client->email }}" type="email" id="email" name="email"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            {{-- الهاتف --}}
            <div class="mb-4">
                <label for="phone" class="block mb-1 font-medium">رقم الهاتف</label>
                <input dir="rtl" value="{{ $client->phone }}" type="text" id="phone" name="phone"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- العنوان --}}
            <div class="mb-6">
                <label for="address" class="block mb-1 font-medium">العنوان</label>
                <input dir="rtl" value="{{ $client->address }}" type="text" id="address" name="address"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition w-full">
                    💾 تحديث العميل
                </button>
            </div>
        </form>
    </div>
@endsection

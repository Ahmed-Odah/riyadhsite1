@extends('admin.layout.dashboard')

@section('content')
    <div class="p-6 space-y-8">

        <!-- 🔥 قسم الإحصائيات -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- عدد العملاء -->
            <div class="bg-gradient-to-tr from-green-700 to-green-500 text-white rounded-2xl shadow-xl p-6 flex items-center justify-between transform hover:scale-105 hover:shadow-2xl transition duration-300 contrast-125 saturate-150">
                <div>
                    <h3 class="text-lg font-bold border-b border-white/40 pb-1">إجمالي العملاء</h3>
                    <p class="text-4xl font-extrabold mt-3 drop-shadow">{{ $clients->count() }}</p>
                </div>
                <div class="p-5 bg-green-900 bg-opacity-30 rounded-full shadow-md">
                    <i class="fa-solid fa-users text-3xl"></i>
                </div>
            </div>

            <!-- أحدث عميل -->
            <div class="bg-gradient-to-tr from-blue-700 to-blue-500 text-white rounded-2xl shadow-xl p-6 flex items-center justify-between transform hover:scale-105 hover:shadow-2xl transition duration-300 contrast-125 saturate-150">
                <div>
                    <h3 class="text-lg font-bold border-b border-white/40 pb-1">آخر عميل مسجل</h3>
                    <p class="text-2xl font-semibold mt-3 drop-shadow">{{ $clients->last()->name ?? '---' }}</p>
                </div>
                <div class="p-5 bg-blue-900 bg-opacity-30 rounded-full shadow-md">
                    <i class="fa-solid fa-user-plus text-3xl"></i>
                </div>
            </div>

            <!-- عملاء هذا الشهر -->
            <div class="bg-gradient-to-tr from-purple-800 to-purple-500 text-black rounded-2xl shadow-xl p-6 flex items-center justify-between transform hover:scale-105 hover:shadow-2xl transition duration-300 contrast-125 saturate-150 text-center">
                <div>
                    <h3 class="text-lg font-bold border-b border-white/40 pb-1">العملاء الجدد (هذا الشهر)</h3>
                    <p class="text-4xl font-extrabold mt-3 drop-shadow">
                        {{ $clients->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count() }}
                    </p>
                </div>
                <div class="p-5 bg-green-50 bg-opacity-30 rounded-full shadow-md">
                    <i class="fa-solid fa-calendar-plus text-3xl text-white"></i>
                </div>

            </div>



        </div>




    <!-- زر إضافة عميل جديد -->
        <div class="flex justify-end">
            <a href="{{ route('client-create-view') }}"
               class="inline-flex items-center gap-2 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 hover:scale-105 duration-200 ease-in-out px-6 py-3 shadow-lg">
                <i class="fa-solid fa-user-plus"></i>
                <span>إضافة عميل جديد</span>
            </a>
        </div>

        <!-- جدول العملاء -->
        <div class="overflow-x-auto rounded-xl shadow-lg border border-gray-200 bg-white">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-right text-sm font-semibold">العمليات</th>
                    <th class="px-4 py-3 text-right text-sm font-semibold">تاريخ الإنشاء</th>
                    <th class="px-4 py-3 text-right text-sm font-semibold">الاسم</th>
                    <th class="px-4 py-3 text-right text-sm font-semibold">البريد الإلكتروني</th>
                    <th class="px-4 py-3 text-right text-sm font-semibold">الهاتف</th>
                    <th class="px-4 py-3 text-right text-sm font-semibold">العنوان</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-800 text-sm">
                @foreach($clients as $client)
                    <tr class="hover:bg-gray-50 transition">
                        <!-- العمليات -->
                        <td class="px-4 py-3 text-right">
                            <div class="flex gap-2 justify-end">
                                <form action="{{ route('client-delete', $client->id) }}" method="POST" onsubmit="return confirm('⚠️ هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    <button type="submit"
                                            class="px-3 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm font-medium shadow">
                                        حذف
                                    </button>
                                </form>
                                <form action="{{ route('client-edit-view', $client->id) }}" method="GET">
                                    <button type="submit"
                                            class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm font-medium shadow">
                                        تعديل
                                    </button>
                                </form>
                            </div>
                        </td>

                        <!-- تاريخ الإنشاء -->
                        <td class="px-4 py-3 text-right">
                            {{ $client->created_at->format('Y-m-d') }}
                        </td>

                        <!-- الاسم -->
                        <td class="px-4 py-3 text-right font-bold">
                            {{ $client->name }}
                        </td>

                        <!-- البريد الإلكتروني -->
                        <td class="px-4 py-3 text-right">
                            {{ $client->email }}
                        </td>

                        <!-- الهاتف -->
                        <td class="px-4 py-3 text-right">
                            {{ $client->phone }}
                        </td>

                        <!-- العنوان -->
                        <td class="px-4 py-3 text-right">
                            {{ $client->address }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

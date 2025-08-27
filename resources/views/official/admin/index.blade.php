@extends('admin.layout.dashboard')

@section('content')
    <div class="p-6">
        <!-- زر إضافة صورة جديدة -->
        <div class="mb-6">
            <a href="{{ route('official-create-view') }}"
               class="inline-flex items-center bg-green-200 w-56 justify-center text-green-900 font-bold rounded-xl hover:scale-100 duration-200 ease-in-out px-4 py-3 shadow">
                إضافة صورة جديدة
            </a>
        </div>

        <!-- جدول المسؤولين -->
        <div class="overflow-x-auto rounded-lg shadow border border-gray-300">
            <table class="min-w-full bg-white table-fixed border-collapse border border-gray-300">
                <thead class="bg-gray-100 text-gray-700 border-b border-gray-300">
                <tr>
                    <th class="w-36 px-4 py-3 text-right text-sm font-semibold border-l border-gray-300">العمليات</th>
                    <th class="w-32 px-4 py-3 text-right text-sm font-semibold border-l border-gray-300">تاريخ الإنشاء</th>
                    <th class="w-24 px-4 py-3 text-center text-sm font-semibold border-l border-gray-300">الصورة</th>
                    <th class="w-2/5 px-4 py-3 text-right text-sm font-semibold border-l border-gray-300">الوصف</th>
                    <th class="w-1/4 px-4 py-3 text-right text-sm font-semibold border-l border-gray-300">العنوان</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-800 text-sm">
                @foreach($officials as $official)
                    <tr class="hover:bg-gray-50 transition">
                        <!-- العمليات -->
                        <td class="px-4 py-3 text-right border border-gray-300 align-middle">
                            <div class="flex gap-2 justify-end">
                                <form action="{{ route('official-delete', $official->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    <button type="submit"
                                            class="px-3 py-1.5 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm font-medium">
                                        حذف
                                    </button>
                                </form>
                                <form action="{{ route('official-edit-view', $official->id) }}" method="GET">
                                    <button type="submit"
                                            class="px-3 py-1.5 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition text-sm font-medium">
                                        تعديل
                                    </button>
                                </form>
                            </div>
                        </td>

                        <!-- تاريخ الإنشاء -->
                        <td class="px-4 py-3 text-right border border-gray-300 align-middle">
                            {{ $official->created_at->format('Y-m-d') }}
                        </td>

                        <!-- الصورة -->
                        <td class="px-4 py-3 text-center border border-gray-300 align-middle">
                            @if($official->image)
                                <img src="{{ asset('public/storage/' . $official->image) }}"
                                     class="h-16 w-16 object-cover rounded-lg border border-gray-200 mx-auto" alt="غلاف">
                            @else
                                <span class="text-gray-400 italic text-sm">لا يوجد</span>
                            @endif
                        </td>

                        <!-- الوصف -->
                        <td class="px-4 py-3 text-right border border-gray-300 align-middle whitespace-normal break-words">
                            {{ Str::limit($official->description, 80) }}
                        </td>

                        <!-- العنوان -->
                        <td class="px-4 py-3 font-semibold text-gray-900 text-right border border-gray-300 align-middle">
                            {{ $official->title }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

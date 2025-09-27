@extends('admin.layout.dashboard')

@section('content')
    <div class="p-6">
        <div class="bg-green-200 w-56 flex justify-center items-center mb-4 rounded-xl hover:scale-100 duration-200 ease-in-out">
            <a href="{{ route('admin.blog.create.view') }}">
                <h1 class="text-lg font-bold p-3">اضافة مدونة جديدة</h1>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow rounded-t-xl">
                <thead class="bg-gray-100 text-gray-700 rounded-t-xl">
                <tr>
                    <th class="px-4 py-2 text-right border-b">العمليات</th>
                    <th class="px-4 py-2 text-right border-b">الانشاء</th>
                    <th class="px-4 py-2 text-right border-b">الصورة</th>
                    <th class="px-4 py-2 text-right border-b">الوصف</th>
                    <th class="px-4 py-2 text-right border-b">العنوان</th>
                    <th class="px-4 py-2 text-right border-b">الرابط</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr class="text-gray-800 text-right">
                        <td class="px-4 py-2 border-b">
                            <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                <button type="submit" class="text-red-500 hover:underline">حذف</button>
                            </form>
                            <form action="{{ route('admin.blog.update.view', $blog->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:underline">تعديل</button>
                            </form>
                        </td>
                        <td class="px-4 py-2 border-b">{{ $blog->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 border-b">
                            @if($blog->image)
                                <img src="{{ asset('public/storage/' . $blog->image) }}" class="h-16 w-16 object-cover rounded" alt="غلاف">
                            @else
                                لا يوجد
                            @endif
                        </td>
                        <td class="px-4 py-2 border-b">{{ Str::limit($blog->description, 50) }}</td>
                        <td class="px-4 py-2 border-b">{{ $blog->title }}</td>
                        <td class="px-4 py-2 border-b">
                            @if($blog->url)
                                <div class="flex items-center gap-2">
                                    <a href="{{ $blog->url }}" target="_blank" class="text-indigo-600 hover:underline">زيارة</a>
                                    <button onclick="navigator.clipboard.writeText('{{ $blog->url }}').then(()=>alert('تم نسخ الرابط'))"
                                            class="text-gray-700 hover:text-indigo-900">نسخ</button>
                                </div>
                            @else
                                لا يوجد
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

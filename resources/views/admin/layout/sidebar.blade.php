<!-- زر الهامبرغر للجوال -->
<header class="flex items-center justify-between bg-indigo-700 text-white p-4 sm:hidden">
    <h1 class="text-xl font-bold">لوحة التحكم</h1>
    <button id="sidebarToggle" class="p-2 bg-indigo-600 rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</header>

<!-- Overlay عند فتح sidebar على الجوال -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 sm:hidden"></div>

<aside id="sidebar"
       class="fixed inset-y-0 left-0 w-64 bg-gradient-to-r from-indigo-700 to-indigo-900 text-white shadow-xl flex flex-col transform -translate-x-full sm:translate-x-0 transition-transform duration-300 z-50">

    <div class="p-6 text-1xl font-bold border-b border-indigo-500 text-center flex items-center justify-center gap-3">
        <img src="/resha.png" alt="Logo" class="w-20 h-18 object-contain">
        لوحة التحكم
    </div>

    <!-- القائمة مع Scroll -->
    <nav class="flex-1 mt-6 px-4 text-lg font-medium overflow-y-auto">
        <a href="{{ route('dashboard') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('dashboard') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">الرئيسية</span>
            <!-- أيقونة -->
        </a>

        <a href="{{ route('books') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('books') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">الكتب</span>
        </a>

        <!-- أضف باقي الروابط بنفس الطريقة -->
    </nav>
</aside>

<!-- المحتوى الرئيسي -->
<main class="sm:ml-64 p-6 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">محتوى لوحة التحكم</h1>
    <p>هنا توضع جميع الصفحات والمحتويات الخاصة باللوحة.</p>
</main>

<!-- سكربت فتح وغلق sidebar -->
<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
</script>

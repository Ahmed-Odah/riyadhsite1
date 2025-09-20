<nav id="nav" class="fixed left-0 w-full px-5 py-3 bg-transparent  transition-colors duration-300">

    <div class="flex justify-between items-center container mx-auto relative">
        <!-- اللوجو -->
        <a href="" class="flex flex-col items-start gap-0">
            <div class="flex items-center gap-5 -ml-2 sm:-ml-4 md:-ml-6 lg:-ml-8 xl:-ml-10">
                <span id="logo-text" class="text-lg font-bold lg:text-3xl mt-1"></span>
                <img src="{{ asset('/public/resha1q1.png') }}" alt="Logo" class="w-30">
            </div>
        </a>

        <!-- زر المنيو للجوال -->
        <div class="lg:hidden absolute left-4 top-1/2 transform -translate-y-1/2">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <span class="material-icons">menu</span>
            </button>
        </div>

        <!-- روابط سطح المكتب -->
        <div class="hidden lg:flex flex-col md:flex-row items-center justify-center gap-8 md:static absolute w-full md:w-auto p-4 md:p-0 z-20 top-full left-0 md:top-auto md:left-auto"
             :class="{'text-white': !scrolled, 'text-black': scrolled}">
            <style>
                .nav-link {
                    @apply hover:no-underline transition-all duration-300 hover:text-gray-300 transform hover:scale-105;
                }
            </style>

            <div>
                <a href="{{route('homepage')}}" class="nav-link flex items-center">الرئيسية</a>
            </div>

            <div class="relative group">
                <a href="#" class="nav-link flex items-center">
                    <span>عني</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">expand_more</span>
                </a>
                <div class="absolute left-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg
                opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100
                group-hover:visible transition-all duration-200 z-10">
                    <a href="/whous" class="block px-4 py-2 hover:bg-gray-100">من آنا</a>
                    <a href="{{route('certificate')}}" class="block px-4 py-2 hover:bg-gray-100">الشهادات والدورات</a>
                    <a href="{{route('official')}}" class="block px-4 py-2 hover:bg-gray-100">صور رسميه لي</a>
                </div>
            </div>

            <div class="relative group">
                <a href="{{route('books.index')}}" class="nav-link flex items-center">
                    <span>{{ __('site.books') }}</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('sumbook')}}" class="nav-link flex items-center">
                    <span>ملخصات كتب</span>
                </a>
            </div>

            <div class="relative group">
                <a href="#" class="nav-link flex items-center">
                    <span>تصويري</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">expand_more</span>
                </a>
                <div class="absolute left-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg
                opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100
                group-hover:visible transition-all duration-200 z-10">
                    <a href="{{route('ClientBlackAndWhite')}}" class="block px-4 py-2 hover:bg-gray-100">صور آبيض وآسود</a>
                    <a href="{{route('colorphotos')}}" class="block px-4 py-2 hover:bg-gray-100">صور ملونه</a>
                </div>
            </div>

            <div class="relative group">
                <a href="{{route('decor')}}" class="nav-link flex items-center">
                    <span>صور الديكورات</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">expand_more</span>
                </a>
                <div class="absolute left-0 mt-2 w-56 bg-white text-black rounded-lg shadow-lg
                opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100
                group-hover:visible transition-all duration-200 z-10">
                    <a href="{{route('kitchen')}}" class="block px-4 py-2 hover:bg-gray-100">مطابخ</a>
                    <a href="{{route('pool')}}" class="block px-4 py-2 hover:bg-gray-100">مسابح</a>
                    <a href="{{route('office')}}" class="block px-4 py-2 hover:bg-gray-100">مكتب منزلي</a>
                    <a href="{{route('bathroom')}}" class="block px-4 py-2 hover:bg-gray-100">حمامات</a>
                    <a href="{{route('diningroom')}}" class="block px-4 py-2 hover:bg-gray-100">غرف طعام</a>
                    <a href="{{route('laundryroom')}}" class="block px-4 py-2 hover:bg-gray-100">غرف غسيل</a>
                    <a href="{{route('livingroom')}}" class="block px-4 py-2 hover:bg-gray-100">غرف جلوس</a>
                    <a href="{{route('warehouse')}}" class="block px-4 py-2 hover:bg-gray-100">خزائن</a>
                    <a href="{{route('externalsession')}}" class="block px-4 py-2 hover:bg-gray-100">جلسات خارجية</a>
                    <a href="{{route('landscape')}}" class="block px-4 py-2 hover:bg-gray-100">لاند سكيب</a>
                    <a href="{{route('bedroom')}}" class="block px-4 py-2 hover:bg-gray-100">غرف نوم أولاد وبنات</a>
                    <a href="{{route('drawer')}}" class="block px-4 py-2 hover:bg-gray-100">تصميم درج</a>
                    <a href="{{route('chamber')}}" class="block px-4 py-2 hover:bg-gray-100">غرف نوم</a>
                    <a href="{{route('gym')}}" class="block px-4 py-2 hover:bg-gray-100">جيم منزلي</a>
                    <a href="{{route('terrace')}}" class="block px-4 py-2 hover:bg-gray-100">برندة</a>
                    <a href="{{route('house')}}" class="block px-4 py-2 hover:bg-gray-100">منازل ريفية</a>
                </div>
            </div>

            <div class="relative group">
                <a href="{{route('paintings')}}" class="nav-link flex items-center">
                    <span>معرض اللوحات</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('coin')}}" class="nav-link flex items-center">
                    <span>عملات عالمية</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('blog')}}" class="nav-link flex items-center">
                    <span>المدونة</span>
                </a>
            </div>

            <div class="relative group">
                <a href="#" class="nav-link flex items-center">
                    <span>قنواتي</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">expand_more</span>
                </a>
                <div class="absolute left-0 mt-2 w-56 bg-white text-black rounded-lg shadow-lg
                opacity-0 invisible group-hover:opacity-100 group-hover:visible
                transition-all duration-300 ease-in-out z-10">
                    <a href="{{route('channel')}}" class="block px-4 py-2 hover:bg-gray-100">قناة اليوتيوب</a>
                    <a href="{{route('channeltik')}}" class="block px-4 py-2 hover:bg-gray-100">قناة التيك توك</a>
                </div>
            </div>

            <!-- زر انضم إلينا -->
            <a href="{{ route('client') }}"
               class="inline-block text-center px-4 py-2 bg-cyan-600 text-white rounded-full font-semibold text-sm hover:bg-cyan-700 transition"
               style="min-width: 120px;">
                انضم إلينا
            </a>
        </div>

        <div>
            @if(\Illuminate\Support\Facades\Auth::check())
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link">LogOut</button>
                </form>
            @endif
        </div>
    </div>
</nav>

<!-- منيو الموبايل -->
<div id="menu"
     class="fixed top-0 left-0 w-full h-screen p-4 bg-black text-white shadow-lg z-50 hidden
            flex-col gap-6 items-start justify-start pt-10 lg:hidden overflow-y-auto">

    <div class="flex flex-col gap-6 mt-16 w-full">
        <!-- نفس روابط سطح المكتب (مكررة للجوال) -->
        <a href="{{route('homepage')}}" class="nav-link">الرئيسية</a>
        <a href="/whous" class="nav-link">من آنا</a>
        <a href="{{route('books.index')}}" class="nav-link">{{ __('site.books') }}</a>
        <a href="{{route('sumbook')}}" class="nav-link">ملخصات كتب</a>
        <a href="{{route('paintings')}}" class="nav-link">معرض اللوحات</a>
        <a href="{{route('coin')}}" class="nav-link">عملات عالمية</a>
        <a href="{{route('blog')}}" class="nav-link">المدونة</a>
        <a href="{{route('channel')}}" class="nav-link">قنواتي</a>

        <a href="{{ route('client') }}"
           class="inline-block text-center px-4 py-2 bg-cyan-600 text-white rounded-full font-semibold text-sm hover:bg-cyan-700 transition"
           style="min-width: 120px;">
            انضم إلينا
        </a>

        @if(\Illuminate\Support\Facades\Auth::check())
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="nav-link">LogOut</button>
            </form>
        @endif
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY || window.pageYOffset;
        if (scrollPosition > 50) {
            document.getElementById('nav').classList.add('navbar-scrolled');
        } else {
            document.getElementById('nav').classList.remove('navbar-scrolled');
        }
    });
</script>

<style>
    nav {
        z-index: 500;
        padding: 1rem;
        transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        background-color: transparent;
        color: black;
    }

    /* زر المنيو */
    #menu-toggle,
    #menu-toggle .material-icons {
        color: black !important;
    }

    /* عند النزول */
    nav.navbar-scrolled {
        background-color: white !important;
        color: black !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        @apply transition-all duration-300 ease-in-out font-extrabold;
    }

    .nav-link:hover {
        color: #1e3a8a;
        transform: scale(1.2);
        text-decoration: none;
    }

    nav.navbar-scrolled a,
    nav.navbar-scrolled span,
    nav.navbar-scrolled button,
    nav.navbar-scrolled #menu-toggle .material-icons {
        color: black !important;
        transition: color 0.3s ease;
    }
</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

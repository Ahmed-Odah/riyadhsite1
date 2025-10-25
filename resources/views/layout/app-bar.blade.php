<nav id="nav" class="fixed top-0 left-0 w-full z-50 bg-transparent backdrop-blur-md transition-all duration-300 px-4 py-3">
    <div class="flex justify-between items-center container mx-auto">
        <!-- اللوجو -->
        <a href="{{route('homepage')}}" class="flex items-center gap-2">
            <img src="{{ asset('/public/r2000.png') }}" alt="Logo" class="w-12 h-12 object-contain">
            <span id="logo-text" class="text-lg font-bold text-black lg:text-2xl">Collection Riyadh</span>
        </a>

        <!-- زر المنيو للجوال -->
        <button id="menu-toggle" class="text-black lg:hidden focus:outline-none">
            <span class="material-icons text-3xl">menu</span>
        </button>

        <!-- روابط سطح المكتب -->
        <div class="hidden lg:flex items-center gap-8 text-black font-semibold">
            <a href="{{route('homepage')}}" class="nav-link">الرئيسية</a>
            <a href="/whous" class="nav-link">من آنا</a>
            <a href="{{route('books.index')}}" class="nav-link">{{ __('site.books') }}</a>
            <a href="{{route('sumbook')}}" class="nav-link">ملخصات كتب</a>
            <a href="{{route('paintings')}}" class="nav-link">معرض اللوحات</a>
            <a href="{{route('coin')}}" class="nav-link">عملات عالمية</a>
            <a href="{{route('blog')}}" class="nav-link">المدونة</a>
            <a href="{{route('channel')}}" class="nav-link">قنواتي</a>
            <a href="{{ route('client') }}" class="join-btn">انضم إلينا</a>
        </div>
    </div>

    <!-- قائمة الجوال -->
    <div id="menu" class="hidden flex-col gap-4 mt-4 lg:hidden text-black bg-white rounded-2xl shadow-md p-4">
        <a href="{{route('homepage')}}" class="nav-link">الرئيسية</a>
        <a href="/whous" class="nav-link">من آنا</a>
        <a href="{{route('books.index')}}" class="nav-link">{{ __('site.books') }}</a>
        <a href="{{route('sumbook')}}" class="nav-link">ملخصات كتب</a>
        <a href="{{route('paintings')}}" class="nav-link">معرض اللوحات</a>
        <a href="{{route('coin')}}" class="nav-link">عملات عالمية</a>
        <a href="{{route('blog')}}" class="nav-link">المدونة</a>
        <a href="{{route('channel')}}" class="nav-link">قنواتي</a>

        <a href="{{ route('client') }}" class="join-btn text-center">
            انضم إلينا
        </a>

        @if(\Illuminate\Support\Facades\Auth::check())
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="nav-link">تسجيل الخروج</button>
            </form>
        @endif
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const nav = document.getElementById('nav');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
    });
</script>

<style>
    nav {
        transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    }

    /* عند التمرير */
    nav.navbar-scrolled {
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        display: block;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        background-color: #f3f4f6;
        transform: scale(1.05);
        text-decoration: none;
    }

    .join-btn {
        background-color: #FFC107;
        color: white;
        padding: 0.5rem 1.2rem;
        border-radius: 9999px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .join-btn:hover {
        background-color: #eab308;
        transform: scale(1.05);
    }

    /* للجوال */
    #menu {
        animation: fadeDown 0.3s ease;
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

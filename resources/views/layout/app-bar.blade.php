<nav id="nav" class="fixed left-0 w-full px-5 py-3 bg-transparent text-white transition-colors duration-300">
    <div class="flex justify-between items-center container mx-auto relative">
        <a href="" class="flex flex-col items-start gap-0">
            <div class="flex items-center gap-5 -ml-2 sm:-ml-4 md:-ml-6 lg:-ml-8 xl:-ml-10">
                <span id="logo-text" class="text-lg font-bold lg:text-3xl mt-1"></span>
                <img src="{{ asset('/resha.png') }}" alt="Logo" class="w-30">
            </div>
        </a>

        <div class="lg:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <span class="material-icons">menu</span>
            </button>
        </div>

        <div class="{{!request()->is('/') ? 'text-black' : 'text-white'}} hidden lg:flex flex-col md:flex-row items-center justify-center gap-8 md:static absolute w-full md:w-auto p-4 md:p-0 z-20 top-full left-0 md:top-auto md:left-auto"
             :class="{'text-white': !scrolled, 'text-black': scrolled}">
            <style>
                .nav-link {
                    @apply transition-all duration-300 ease-in-out font-bold text-base lg:text-lg;
                }
            </style>

            <div>
                <a href="{{route('homepage')}}" class="nav-link flex items-center">الرئيسية</a>
            </div>

            <div class="relative group">
                <a href="#" class="nav-link flex items-center">
                    <span>عني</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">
                        expand_more
                    </span>
                </a>

                <div class="absolute left-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg
                opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100
                group-hover:visible transition-all duration-200 z-10">
                    <a href="/whous" class="block px-4 py-2 hover:bg-gray-100">من آنا</a>
                    <a href="{{route('official')}}" class="block px-4 py-2 hover:bg-gray-100">صور رسميه لي</a>
                </div>
            </div>

            <div class="relative group">
                <a href="{{route('books.index')}}" class="nav-link flex items-center">
                    <span>{{ __('site.books') }}</span>
                </a>
            </div>

            <div class="relative group">
                <a href="#" class="nav-link flex items-center">
                    <span>تصويري</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">
                        expand_more
                    </span>
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
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('paintings')}}" class="nav-link flex items-center">
                    <span>معرض اللوحات</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('certificate')}}" class="nav-link flex items-center">
                    <span>الشهادات والدورات</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('blog')}}" class="nav-link flex items-center">
                    <span>المدونة</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('coin')}}" class="nav-link flex items-center">
                    <span>عملات عالمية</span>
                </a>
            </div>

            <div class="relative group">
                <a href="{{route('sumbook')}}" class="nav-link flex items-center">
                    <span>ملخصات كتب</span>
                </a>
            </div>

            <div class="relative group">
                <a href="#" class="nav-link flex items-center">
                    <span>قنواتي</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">expand_more</span>
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
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    window.addEventListener('scroll', () => {
        const nav = document.getElementById('nav');
        const scrollPosition = window.scrollY || window.pageYOffset;
        if (scrollPosition > 50) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
    });
</script>

<style>
    nav {
        z-index: 500;
        padding: 1rem;
        transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        background-color: transparent;
        color: white;
    }

    nav.navbar-scrolled {
        background-color: white !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: black !important;
    }

    .nav-link {
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease-in-out;
    }

    .nav-link:hover {
        color: #1e3a8a;
        transform: scale(1.1);
        text-decoration: none;
    }

    nav.navbar-scrolled .nav-link {
        color: black !important;
    }

    @media (max-width: 1023px) {
        .nav-link {
            color: white !important;
        }
    }
</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

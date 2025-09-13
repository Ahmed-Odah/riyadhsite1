<nav id="nav" class="fixed left-0 w-full px-5 py-3 bg-transparent text-white transition-colors duration-300">



    <div class="flex justify-between items-center container mx-auto relative">
        <a href="" class="flex flex-col items-start gap-0">
            <div class="flex items-center gap-5 -ml-2 sm:-ml-4 md:-ml-6 lg:-ml-8 xl:-ml-10">
                <span id="logo-text" class="text-lg font-bold lg:text-3xl mt-1"></span>
                <img src="{{ asset('/public/resha1q1.png') }}" alt="Logo" class="w-30">
            </div>

        </a>

        <!-- زر المنيو (صار يسار) -->
        <div class="lg:hidden absolute left-4 top-1/2 transform -translate-y-1/2">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <span class="material-icons">menu</span>
            </button>
        </div>






        <div class="{{!request()->is('/') ? 'text-black' : 'text-black'}} hidden lg:flex flex-col md:flex-row items-center justify-center gap-8 md:static absolute w-full md:w-auto p-4 md:p-0 z-20 top-full left-0 md:top-auto md:left-auto"
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
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">
            expand_more
        </span>
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
                    <span>ملخصات كتب </span>
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
                    <a href="{{route('ClientBlackAndWhite')}}" class="block px-4 py-2 hover:bg-gray-100 ">صور آبيض وآسود</a>
                    <a href="{{route('colorphotos')}}" class="block px-4 py-2 hover:bg-gray-100 ">صور ملونه</a>
                </div>
            </div>


            <div class="relative group">
                <a href="{{route('decor')}}" class="nav-link flex items-center">
                    <span>صور الديكورات</span>
                    <span class="material-icons transform group-hover:rotate-180 transition-transform">
            expand_more
        </span>
                </a>

                <div class="absolute left-0 mt-2 w-56 bg-white text-black rounded-lg shadow-lg
                opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100
                group-hover:visible transition-all duration-200 z-10">

                    <a href="{{route('kitchen')}}" class="block px-4 py-2 hover:bg-gray-100 ">مطابخ</a>
                    <a href="{{route('pool')}}" class="block px-4 py-2 hover:bg-gray-100 ">مسابح</a>
                    <a href="{{route('office')}}" class="block px-4 py-2 hover:bg-gray-100 ">مكتب منزلي</a>
                    <a href="{{route('bathroom')}}" class="block px-4 py-2 hover:bg-gray-100 ">حمامات</a>
                    <a href="{{route('diningroom')}}" class="block px-4 py-2 hover:bg-gray-100 ">غرف طعام</a>
                    <a href="{{route('laundryroom')}}" class="block px-4 py-2 hover:bg-gray-100 ">غرف غسيل</a>
                    <a href="{{route('livingroom')}}" class="block px-4 py-2 hover:bg-gray-100 ">غرف جلوس</a>
                    <a href="{{route('warehouse')}}" class="block px-4 py-2 hover:bg-gray-100 ">خزائن</a>
                    <a href="{{route('externalsession')}}" class="block px-4 py-2 hover:bg-gray-100 ">جلسات خارجية</a>
                    <a href="{{route('landscape')}}" class="block px-4 py-2 hover:bg-gray-100 ">لاند سكيب</a>
                    <a href="{{route('bedroom')}}" class="block px-4 py-2 hover:bg-gray-100 ">غرف نوم أولاد وبنات</a>
                    <a href="{{route('drawer')}}" class="block px-4 py-2 hover:bg-gray-100 ">تصميم درج</a>
                    <a href="{{route('chamber')}}" class="block px-4 py-2 hover:bg-gray-100 ">غرف نوم</a>
                    <a href="{{route('gym')}}" class="block px-4 py-2 hover:bg-gray-100 ">جيم منزلي</a>
                    <a href="{{route('terrace')}}" class="block px-4 py-2 hover:bg-gray-100 ">برندة</a>
                    <a href="{{route('house')}}" class="block px-4 py-2 hover:bg-gray-100 ">منازل ريفية</a>
                </div>
            </div>


            <div class="relative group">
                <a href="{{route('paintings')}}" class="nav-link flex items-center">
                    <span>معرض اللوحات</span>
                </a>
            </div>




            <div class="relative group">
                <a href="{{route('coin')}}" class="nav-link flex items-center">
                    <span>عملات عالمية </span>
                </a>
            </div>
            <div class="relative group">
                <a href="{{route('blog')}}" class="nav-link flex items-center">
                    <span> المدونة</span>
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
                    <a href="{{route('channel')}}" class="block px-4 py-2 hover:bg-gray-100 ">قناة اليوتيوب</a>
                    <a href="{{route('channeltik')}}" class="block px-4 py-2 hover:bg-gray-100 ">قناة التيك توك</a>
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

        <div class="group hidden lg:block"></div>
    </div>
</nav>




<!-- منيو الموبايل -->
<div id="menu"
     class="fixed top-0 left-0 w-full h-full p-6 bg-white text-black shadow-2xl z-50 hidden flex-col gap-6 items-start justify-start overflow-y-auto">

    <!-- زر الإغلاق -->
    <div class="w-full flex justify-between items-center mb-6">
        <span class="text-xl font-extrabold">القائمة</span>
        <button id="menu-close" class="text-gray-700 text-3xl font-bold">&times;</button>
    </div>

    <!-- الروابط -->
    <a href="{{route('homepage')}}" class="nav-link text-lg font-bold">الرئيسية</a>
    <a href="/whous" class="nav-link text-lg font-bold">من أنا</a>
    <a href="{{route('books.index')}}" class="nav-link text-lg font-bold">الكتب</a>
    <a href="{{route('sumbook')}}" class="nav-link text-lg font-bold">ملخصات كتب</a>

    <!-- تصويري -->
    <div>
        <p class="text-lg font-bold mb-2">تصويري</p>
        <div class="pl-4 flex flex-col gap-2">
            <a href="{{route('ClientBlackAndWhite')}}" class="nav-link">صور أبيض وأسود</a>
            <a href="{{route('colorphotos')}}" class="nav-link">صور ملونة</a>
        </div>
    </div>

    <!-- صور الديكورات -->
    <div>
        <p class="text-lg font-bold mb-2">صور الديكورات</p>
        <div class="pl-4 flex flex-col gap-2">
            <a href="{{route('kitchen')}}" class="nav-link">مطابخ</a>
            <a href="{{route('pool')}}" class="nav-link">مسابح</a>
            <a href="{{route('office')}}" class="nav-link">مكتب منزلي</a>
            <a href="{{route('bathroom')}}" class="nav-link">حمامات</a>
            <a href="{{route('diningroom')}}" class="nav-link">غرف طعام</a>
            <a href="{{route('laundryroom')}}" class="nav-link">غرف غسيل</a>
            <a href="{{route('livingroom')}}" class="nav-link">غرف جلوس</a>
            <a href="{{route('warehouse')}}" class="nav-link">خزائن</a>
            <a href="{{route('externalsession')}}" class="nav-link">جلسات خارجية</a>
            <a href="{{route('landscape')}}" class="nav-link">لاند سكيب</a>
            <a href="{{route('bedroom')}}" class="nav-link">غرف نوم أولاد وبنات</a>
            <a href="{{route('drawer')}}" class="nav-link">تصميم درج</a>
            <a href="{{route('chamber')}}" class="nav-link">غرف نوم</a>
            <a href="{{route('gym')}}" class="nav-link">جيم منزلي</a>
            <a href="{{route('terrace')}}" class="nav-link">برندة</a>
            <a href="{{route('house')}}" class="nav-link">منازل ريفية</a>
        </div>
    </div>

    <a href="{{route('paintings')}}" class="nav-link text-lg font-bold">معرض اللوحات</a>
    <a href="{{route('certificate')}}" class="nav-link text-lg font-bold">الشهادات والدورات</a>
    <a href="{{route('coin')}}" class="nav-link text-lg font-bold">العملات العالمية</a>
    <a href="{{route('blog')}}" class="nav-link text-lg font-bold">المدونة</a>

    <!-- قنواتي -->
    <div>
        <p class="text-lg font-bold mb-2">قنواتي</p>
        <div class="pl-4 flex flex-col gap-2">
            <a href="{{route('channel')}}" class="nav-link">قناة اليوتيوب</a>
            <a href="{{route('channeltik')}}" class="nav-link">قناة التيك توك</a>
        </div>
    </div>

    <!-- زر انضم إلينا -->
    <a href="{{ route('client') }}"
       class="mt-6 w-full text-center px-6 py-3 bg-cyan-600 text-white rounded-full font-bold text-lg hover:bg-cyan-700 transition">
        انضم إلينا
    </a>

    <!-- زر تغيير اللغة -->
    <div class="mt-4 w-full text-center">
        <button class="px-4 py-2 border border-gray-400 rounded-lg text-sm font-semibold hover:bg-gray-100">
            EN
        </button>
    </div>

    <!-- تسجيل الخروج -->
    @if(\Illuminate\Support\Facades\Auth::check())
        <form action="{{route('logout')}}" method="POST" class="mt-4 w-full">
            @csrf
            <button type="submit" class="w-full text-center py-2 text-red-600 font-bold">تسجيل خروج</button>
        </form>
    @endif
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const menuClose = document.getElementById('menu-close');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    menuClose.addEventListener('click', () => {
        menu.classList.add('hidden');
    });
</script>

<style>
    .nav-link {
        @apply text-base font-semibold transition duration-200 hover:text-cyan-600;
    }
</style>

</div>

</div>
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const logoText = document.getElementById('logo-text');

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
        color: white;
    }

    /* افتراضياً الأيقونة سوداء */
    #menu-toggle,
    #menu-toggle .material-icons {
        color: black !important;
    }

    /* عند التمرير (navbar-scrolled) تتحول إلى أبيض */
    @media (min-width: 1024px) {
        nav.navbar-scrolled #menu-toggle,
        nav.navbar-scrolled #menu-toggle .material-icons {
            color: white !important;
        }
    }

        .nav-link {
            @apply transition-all duration-300 ease-in-out font-extrabold; /* نص أكثر سمكًا */
        }

        /* إذا أحببت، يمكنك اختيار font-black ليكون أسمك */

            /* جعل النص Bold */
        }

        /* عند مرور الماوس */
        .nav-link:hover {
            color: #1e3a8a; /* كحلي غامق */
            transform: scale(1.2); /* تكبير أوضح */
            text-decoration: none;
        }

        /* عند الضغط بالماوس */

        nav.navbar-scrolled a,
    nav.navbar-scrolled span,
    nav.navbar-scrolled button {
            color: black !important; /* اجعل النص أسود */
            transition: color 0.3s ease; /* انتقال سلس للون */

        }


</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

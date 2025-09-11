<aside class="w-64 bg-gradient-to-r from-indigo-700 to-indigo-900 text-white shadow-xl h-screen flex flex-col">
    <div class="p-6 text-1xl font-bold border-b border-indigo-500 text-center flex items-center justify-center gap-3">
        <img src="/resha.png" alt="Logo" class="w-20 h-18 object-contain">
        لوحة التحكم
    </div>

    <!-- خلي القائمة تتمدد وتاخذ مساحة فاضية + Scroll -->
    <nav class="flex-1 mt-6 px-4 text-lg font-medium overflow-y-auto">

        {{-- الرئيسية --}}
        <a href="{{ route('dashboard') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('dashboard') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">الرئيسية</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
            </svg>
        </a>

        {{-- الكتب --}}
        <a href="{{ route('books') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('books') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">الكتب</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M12 4h9M4 9h16M4 15h16" />
            </svg>
        </a>

        {{-- المستخدمين --}}


        {{-- من أنا --}}
        <a href="{{ route('whous-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('whous-index') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">من أنا</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.295.538 6.121 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </a>

        {{-- الشهادات والدورات --}}
        <a href="{{route('certificate-index')}}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('certificates') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">الشهادات والدورات</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.5 12.083 12.083 0 015.84 10.578L12 14z" />
            </svg>
        </a>

        {{-- المدونة --}}
        <a href="{{ route('admin.blog.index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('admin.blog.index') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">المدونة</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M12 4h9M4 9h16M4 15h16" />
            </svg>
        </a>

        {{-- BlackAndWhite --}}
        <a href="{{ route('BlackAndWhite.index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('BlackAndWhite.index') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">صور آسود وآبيض</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12" />
            </svg>
        </a>


        <a href="{{ route('colorphoto-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">صور ملونة</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>


        <a href="{{ route('kitchen-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور المطابخ</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>


        <a href="{{ route('pool-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور المسابح</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('office-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور مكتب منزلي</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('diningroom-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('diningroom-index') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> غرف طعام</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>



        <a href="{{ route('bathroom-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور حمامات</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>



        <a href="{{ route('laundryroom-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور غرف غسيل</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('livingroom-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور غرف الجلوس</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>


        <a href="{{ route('warehouse-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور خزائن</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('externalsession-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> جلسات خارجية</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>



        <a href="{{ route('landscape-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> لاند سكيب</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('bedroom-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> غرف آولاد وبنات </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>



        <a href="{{ route('drawer-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> تصميم درج </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('chamber-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> غرف نوم </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('gym-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> جيم منزلي </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('terrace-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> برندة </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>



        <a href="{{ route('house-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> منازل ريفية </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>



        <a href="{{ route('official-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> صور رسمية لي </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>




        <a href="{{ route('coin-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> العملات العالمية</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>

        <a href="{{ route('colorphoto-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> الإنجازات الهندسية </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>




        <a href="{{ route('sumbook-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> ملخصات الكتب </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>




        <a href="{{ route('client2-index') }}"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('colorphoto') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right"> إحصائيات العملاء </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-1.13a4 4 0 10-8 0 4 4 0 008 0z" />
            </svg>
        </a>






        {{-- الإعدادات --}}
        <a href="#"
           class="flex flex-row-reverse items-center justify-between px-3 py-2 rounded-lg hover:bg-indigo-600 transition
           {{ request()->routeIs('settings') ? 'bg-indigo-800 shadow-lg' : '' }}">
            <span class="text-right">الإعدادات</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 1.79-4 4a4 4 0 104-4z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12a10 10 0 1120 0 10 10 0 01-20 0z" />
            </svg>
        </a>

    </nav>
</aside>

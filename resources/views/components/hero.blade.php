<style>



    /* زر الرجوع للأعلى */
    #scrollTopBtn {
        transition: opacity 0.4s ease;
    }

    /* الخلفية */
    .bg-gradient {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .animated-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 200%;
        height: 200%;
        background: linear-gradient(-45deg, #000000, #845ec2, #000000, #009efd);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
        z-index: -1;
    }

    @keyframes gradientAnimation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in-up {
        animation: fadeInUp 1.2s ease-out forwards;
        animation-delay: 0.5s;
    }
</style>

<body>
<!-- رسالة Scroll Alert أسفل يمين -->
<div id="scroll-alert"
     class="fixed bottom-5 right-5 bg-blue-600 text-white px-6 py-4 rounded-xl shadow-xl opacity-0 transition-opacity duration-500 max-w-sm z-50">
    <h2 class="text-xl font-bold mb-1">مرحبًا بك!</h2>
    <p class="text-sm">سجّل الآن لتصلك آخر التحديثات والعروض الحصرية.</p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollAlert = document.getElementById('scroll-alert');
        let alertShown = false;

        window.addEventListener('scroll', () => {
            // ظهور الرسالة عند التمرير أكثر من 150px
            if (!alertShown && window.scrollY > 150) {
                alertShown = true;

                // إظهار الرسالة
                scrollAlert.classList.remove('opacity-0');
                scrollAlert.classList.add('opacity-100');

                // إخفاء الرسالة بعد 5 ثواني
                setTimeout(() => {
                    scrollAlert.classList.remove('opacity-100');
                    scrollAlert.classList.add('opacity-0');
                }, 5000);
            }
        });
    });
</script>


<!-- المحتوى الرئيسي -->
<div class="min-h-screen flex items-center justify-end
            bg-gradient-to-tr from-gray-50 via-green-50 to-gray-100
            relative overflow-hidden">




    <div class="w-full lg:w-1/2 text-right px-6 lg:mr-20 lg:ml-auto">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-cyan-700 mb-4">
            موقع رياض <span class="text-cyan-900">الرسمي</span>
        </h1>




        <p class="text-gray-900 text-lg mb-6 max-w-2xl ml-auto">
            خليط من الحرف والضوء، من الفكرة واللحظة. أهلاً بك في عالمي.
        </p>


        <!-- الأزرار -->
        <div class="flex flex-col sm:flex-row gap-3 mt-12">
            <a href="#join"
               class="bg-cyan-600 hover:bg-cyan-500 text-white font-semibold
              px-4 py-2 rounded-lg shadow-md transition transform hover:scale-105
              text-xs sm:text-sm flex items-center gap-2 w-fit">
                سجّل معنا
                <!-- أيقونة سهم -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" class="w-3 h-3 sm:w-4 sm:h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="#projects"
               class="bg-white text-teal-600 hover:bg-yellow-500 hover:text-white font-semibold
              px-4 py-2 rounded-lg shadow-md transition transform hover:scale-105
              text-xs sm:text-sm w-fit">
                شاهد إنجازاتي
            </a>
        </div>




    </div>

    <!-- الصورة (يسار) -->
    <div class="hidden lg:flex w-full lg:w-1/2 justify-center">
        <img src="book11.jpg" alt="صورة جانبية"
             class="max-w-md rounded-3xl shadow-2xl border-4 border-white/20
                transform transition duration-500 hover:scale-105 hover:rotate-1 hover:shadow-cyan-500/50">
    </div>






    <!-- زر واتساب -->
    <a href="https://wa.me/966504408726">
        <div class="bg-green-600 z-20 bottom-5 right-5 rounded-3xl animate-bounce fixed">
            <div class="flex justify-center items-center w-24 h-16 md:h-16 md:w-56 gap-2">
                <img src="whatsapp_11378621.png" alt="WhatsApp" class="h-10 w-10 md:h-10 md:w-10">
                <span class="text-2xl hidden md:block font-bold mt-1 text-white">
    تواصل معنا
</span>
            </div>
        </div>
    </a>

    <!-- زر الرجوع لأعلى الصفحة -->
    <button onclick="scrollToTop()" id="scrollTopBtn"
            class="fixed bottom-20 left-5 bg-gray-800 text-white p-3 rounded-full shadow-lg z-50 hidden hover:bg-gray-700 transition">
        ↑
    </button>
</div>
<script src="https://cdn.tailwindcss.com"></script>

<script>

    // إخفاء/إظهار زر الرجوع لأعلى الصفحة
    const scrollTopBtn = document.getElementById("scrollTopBtn");

    window.onscroll = function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollTopBtn.classList.remove("hidden");
        } else {
            scrollTopBtn.classList.add("hidden");
        }
    };

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // إخفاء شاشة التحميل بعد التحميل
    window.addEventListener("load", function () {
        document.getElementById("loading-screen").classList.add("hidden");
    });
</script>
</body>

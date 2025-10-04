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
<!-- رسالة Scroll Alert بالمنتصف -->
<!-- Scroll Alert -->
<!-- Scroll Alert -->
<div id="scroll-alert"
     class="fixed inset-0 flex items-center justify-center
            bg-black/40 backdrop-blur-sm z-50 opacity-0 pointer-events-none transition-opacity duration-500">
    <div id="scroll-box"
         class="bg-white text-gray-800 px-10 py-8 rounded-3xl shadow-2xl transform scale-90 transition-all duration-500 max-w-lg w-11/12 border border-gray-200 text-center relative">

        <!-- زر الإغلاق (X) -->
        <button id="close-alert"
                class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-3xl font-bold mb-3 text-cyan-700"> أهلاً وسهلاً بك!</h2>
        <p class="text-lg mb-6">سجّل معنا الآن لتصلك أحدث العروض والتحديثات الحصرية.</p>

        <a href="{{ route('client') }}"
           class="inline-block bg-cyan-600 hover:bg-cyan-700 text-white font-semibold px-6 py-3 rounded-full shadow-md transition">
            انضم إلينا
        </a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollAlert = document.getElementById('scroll-alert');
        const box = document.getElementById('scroll-box');
        const closeBtn = document.getElementById("close-alert");
        let alertShown = false;

        // عند التمرير
        window.addEventListener('scroll', () => {
            if (!alertShown && window.scrollY > 150) {
                alertShown = true;

                // إظهار الرسالة
                scrollAlert.classList.remove('opacity-0', 'pointer-events-none');
                scrollAlert.classList.add('opacity-100');
                box.classList.remove('scale-90');
                box.classList.add('scale-100');

                // إخفاء الرسالة بعد 6 ثواني
                setTimeout(() => {
                    closeAlert();
                }, 6000);
            }
        });

        // عند الضغط على زر الإغلاق
        closeBtn.addEventListener("click", closeAlert);

        function closeAlert() {
            scrollAlert.classList.remove('opacity-100');
            scrollAlert.classList.add('opacity-0', 'pointer-events-none');
            box.classList.remove('scale-100');
            box.classList.add('scale-90');
        }
    });
</script>



<div class="bg-gradient text-white min-h-screen w-full flex items-center justify-center relative overflow-hidden">
    <!-- الخلفية المتحركة -->
    <div class="absolute inset-0 z-0">
        <img src="/public/books2001.jpg" class="w-full h-full object-cover brightness-50" alt="Book Image">
    </div>

    <!-- النصوص -->
    <div class="container mx-auto px-6 text-center relative z-10">
        <div class="max-w-2xl mx-auto">
            <section class="py-16 px-4">

                <!-- اسم الشخص -->
                <p class="text-6xl md:text-4xl font-medium text-center animate-fade-in-up" style="color:#FFC107;">
                    م.رياض المقيد
                </p>


                <!-- الموقع الرسمي -->
                <p class="text-xl md:text-2xl font-semibold text-white text-center animate-fade-in-up mt-4">
                    الموقع الرسمي
                </p>

                <!-- العنوان الرئيسي -->
                <h1 class="text-3xl md:text-3xl font-bold text-white text-center leading-snug animate-fade-in-up mt-12">
                    خليط من الحرف والضوء، من الفكرة واللحظة. أهلاً بك في عالمي.
                </h1>

            </section>
        </div>
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










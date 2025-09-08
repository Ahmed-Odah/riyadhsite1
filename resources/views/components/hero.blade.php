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
<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-gray-50 to-green-50 relative overflow-hidden">



    <div class="w-full md:w-1/2 mx-auto text-center">
        <h1 class="text-3xl md:text-5xl font-bold text-teal-700 mb-4">
            نادي الرؤية 2030
        </h1>
        <p class="text-gray-600 text-lg mb-6 max-w-2xl mx-auto">
            بطموحنا نحقق رؤيتنا. ندعم ونحفز طلاب وطالبات جامعة الملك سعود لتكوين مجتمع ريادي
            متوافق مع أهداف رؤية المملكة 2030.
        </p>

        <!-- الأزرار -->
        <div class="flex gap-4 justify-center">
            <a href="#join" class="bg-teal-600 hover:bg-teal-500 text-white font-semibold px-6 py-3 rounded-xl shadow-md transition">
                انضم إلى النادي
            </a>
            <a href="#projects" class="bg-white text-teal-600 border border-teal-600 hover:bg-gray-100 font-semibold px-6 py-3 rounded-xl shadow-md transition">
                استكشف مشاريعنا
            </a>
        </div>
    </div>






    <!-- زر واتساب -->
    <a href="https://wa.me/966504408726">
        <div class="bg-green-600 z-20 bottom-5 right-5 rounded-3xl animate-bounce fixed">
            <div class="flex justify-center items-center w-24 h-16 md:h-16 md:w-56 gap-2">
                <img src="whatsapp_11378621.png" alt="WhatsApp" class="h-10 w-10 md:h-10 md:w-10">
                <span class="text-2xl hidden md:block font-bold mt-1">تواصل معنا</span>
            </div>
        </div>
    </a>

    <!-- زر الرجوع لأعلى الصفحة -->
    <button onclick="scrollToTop()" id="scrollTopBtn"
            class="fixed bottom-20 left-5 bg-gray-800 text-white p-3 rounded-full shadow-lg z-50 hidden hover:bg-gray-700 transition">
        ↑
    </button>
</div>

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

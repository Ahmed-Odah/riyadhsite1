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
<!-- الرسالة -->
<div id="scroll-alert"
     class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white px-8 py-6 rounded-xl shadow-xl opacity-0 transition-opacity duration-500 z-50 max-w-2xl text-center">
    <h2 class="text-2xl font-bold mb-2">مرحبًا بك!</h2>
    <p class="text-lg">سجّل الآن لتصلك آخر التحديثات والعروض الحصرية.</p>
</div>

<script>
    const scrollAlert = document.getElementById('scroll-alert');
    let alertShown = false;

    window.addEventListener('scroll', () => {
        // إظهار الرسالة عند التمرير أكثر من 150px
        if (!alertShown && window.scrollY > 150) {
            alertShown = true;
            scrollAlert.classList.remove('opacity-0');
            scrollAlert.classList.add('opacity-100');

            // إخفاء الرسالة بعد 5 ثواني
            setTimeout(() => {
                scrollAlert.classList.remove('opacity-100');
                scrollAlert.classList.add('opacity-0');
            }, 5000);
        }
    });
</script>

<!-- شاشة التحميل -->
<div id="loading-screen">
    <img id="loading-logo" src="logo.png" alt="Loading...">
</div>

<!-- المحتوى الرئيسي -->
<div class="bg-gradient text-white min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- الخلفية المتحركة -->
    <div class="absolute inset-0 bg-no-repeat bg-cover brightness-37 z-0" style="background-image: url('book1.jpg');"></div>

    <!-- النصوص -->
    <div class="container mx-auto px-6 text-center relative z-10">
        <div class="max-w-2xl mx-auto">
            <section class="py-24 px-4">
                <h1 class="text-2xl md:text-3xl font-semibold text-white text-center leading-snug opacity-0 translate-y-5 animate-fade-in-up shadow-md">
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

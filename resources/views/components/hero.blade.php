<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نادي الرؤية 2030</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* خلفية متدرجة متحركة */
        .animated-gradient {
            position: absolute;
            top: 0; left: 0;
            width: 200%; height: 200%;
            background: linear-gradient(-45deg, #000000, #00c896, #000000, #0080ff);
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
</head>
<body class="relative bg-gray-900 text-white">

<!-- خلفية متحركة -->
<div class="animated-gradient"></div>

<!-- الهيدر -->
<header class="flex justify-between items-center px-8 py-6 relative z-10">
    <div class="flex items-center gap-3">
        <img src="logo.png" alt="Vision 2030 Club" class="h-12">
        <h1 class="text-2xl font-bold">نادي الرؤية 2030</h1>
    </div>
    <nav class="hidden md:flex gap-6 font-semibold">
        <a href="#" class="hover:text-green-400">الرئيسية</a>
        <a href="#" class="hover:text-green-400">المشاريع</a>
        <a href="#" class="hover:text-green-400">الأعضاء</a>
        <a href="#" class="hover:text-green-400">تواصل معنا</a>
    </nav>
    <a href="#" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
        انضم الآن
    </a>
</header>

<!-- البانر الرئيسي -->
<section class="flex flex-col justify-center items-center text-center min-h-screen relative z-10 px-6">
    <h2 class="text-3xl md:text-5xl font-bold mb-6 animate-fade-in-up leading-snug">
        بطموحنا نحقق رؤيتنا ✨<br>
        معًا نحو مستقبل أفضل
    </h2>
    <p class="text-lg md:text-xl mb-8 max-w-2xl opacity-90">
        انضم إلى النادي لتكون جزءًا من المبادرات والمشاريع التي تصنع أثرًا حقيقيًا في مجتمعنا.
    </p>
    <div class="flex gap-4">
        <a href="#" class="bg-green-600 hover:bg-green-500 px-6 py-3 rounded-xl font-bold text-lg shadow-lg">
            استكشف مشاريعنا
        </a>
        <a href="#" class="bg-white text-green-700 hover:bg-gray-100 px-6 py-3 rounded-xl font-bold text-lg shadow-lg">
            تواصل معنا
        </a>
    </div>
</section>

<!-- أرقام وإنجازات -->
<section class="relative z-10 py-20 bg-black/50">
    <div class="container mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <h3 class="text-4xl font-bold text-green-400">600+</h3>
            <p class="mt-2">عضو نشط</p>
        </div>
        <div>

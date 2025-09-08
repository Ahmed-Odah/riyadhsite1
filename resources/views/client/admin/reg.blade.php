<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
</head>
<body>

<form action="{{route('client.post')}}" method="POST" class="bg-white p-8 rounded-3xl shadow-xl max-w-md w-full">
    @csrf
    <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-900 ">إنشاء حساب</h2>

    <div class="mb-6">
        <label for="name" class="block mb-2 font-semibold text-blue-900 text-right">الاسم</label>
        <input
            type="text"
            id="name"
            name="name"
            required
            placeholder="الاسم الكامل"
            class="w-full px-5 py-3 rounded-xl border border-blue-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-blue-900"
        />
    </div>

    <div class="mb-6">
        <label for="email" class="block mb-2 font-semibold text-blue-900 text-right">البريد الإلكتروني</label>
        <input
            type="email"
            id="email"
            name="email"
            required
            placeholder="example@domain.com"
            class="w-full px-5 py-3 rounded-xl border border-blue-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-blue-900"
        />
    </div>

    <div class="mb-8">
        <label for="password" class="block mb-2 font-semibold text-blue-900 text-right">كلمة المرور</label>
        <input
            type="password"
            id="password"
            name="password"
            required
            placeholder="••••••••"
            class="w-full px-5 py-3 rounded-xl border border-blue-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-400 transition duration-300 text-blue-900"
        />
    </div>

    <button
        type="submit"
        class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-xl transition-colors duration-300 shadow-lg shadow-blue-400/50"
    >
        تسجيل حساب جديد
    </button>
</form>

</body>
</html>

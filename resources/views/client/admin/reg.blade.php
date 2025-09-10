{{-- ✅ إشعار النجاح --}}
@if(session('success'))
    <div
        id="successAlert"
        class="fixed top-5 right-5 max-w-sm w-full bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-slide-in"
        style="animation-fill-mode: forwards;"
        dir="rtl"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>

    <style>
        @keyframes slide-in {
            0% {opacity: 0; transform: translateX(100%);}
            100% {opacity: 1; transform: translateX(0);}
        }
        @keyframes slide-out {
            0% {opacity: 1; transform: translateX(0);}
            100% {opacity: 0; transform: translateX(100%);}
        }
        .animate-slide-in {animation: slide-in 0.5s ease forwards;}
        .animate-slide-out {animation: slide-out 0.5s ease forwards;}
    </style>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            alert.classList.remove('animate-slide-in');
            alert.classList.add('animate-slide-out');
            alert.addEventListener('animationend', () => alert.remove());
        }, 3000);
    </script>
@endif

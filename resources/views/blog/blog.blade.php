@extends('layout.master')
@section('content')

    <!-- Section for blogs, positioned below navbar -->
    <section class="mt-20"> <!-- mt-20 لإزاحة المحتوى أسفل الناف بار -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">

                <div class="w-full">
                    <!-- عرض 3 أعمدة جنب بعض -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                        @foreach($blogs as $blog)
                            <div class="group bg-white p-4 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <img src="{{ asset('public/storage/' . $blog->image) }}" alt="blog image" class="rounded-2xl w-full object-cover h-64">
                                </div>
                                <h3 class="text-xl text-gray-900 font-medium leading-8 mb-2 group-hover:text-indigo-900">
                                    {{ $blog->title }}
                                </h3>
                                <p class="text-gray-500 leading-6 mb-4">
                                    {{ Str::limit($blog->description, 150) }} <!-- اختصار الوصف -->
                                </p>
                                <a href="javascript:;" class="cursor-pointer flex items-center gap-2 text-lg text-indigo-900 font-semibold">
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" class="rotate-180" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.25 6L13.25 6M9.5 10.5L13.4697 6.53033C13.7197 6.28033 13.8447 6.15533 13.8447 6C13.8447 5.84467 13.7197 5.71967 13.4697 5.46967L9.5 1.5" stroke="#312E81" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>إقرا آكثر</span>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Javascript Countdown Timer -->
    <script>
        let dest = new Date("mar 31, 2024 23:59:59").getTime();
        let x = setInterval(function () {
            let now = new Date().getTime();
            let diff = dest - now;
            if (diff <= 0) {
                let nextMonthDate = new Date();
                nextMonthDate.setMonth(nextMonthDate.getMonth() + 1);
                if (nextMonthDate.getMonth() === 0) {
                    nextMonthDate.setFullYear(nextMonthDate.getFullYear() + 1);
                }
                dest = nextMonthDate.getTime();
                return;
            }
            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((diff % (1000 * 60)) / 1000);

            days = days < 10 ? `0${days}` : days;
            hours = hours < 10 ? `0${hours}` : hours;
            minutes = minutes < 10 ? `0${minutes}` : minutes;
            seconds = seconds < 10 ? `0${seconds}` : seconds;

            let countdownElements = document.getElementsByClassName("countdown-element");
            for (let i = 0; i < countdownElements.length; i++) {
                let className = countdownElements[i].classList[1];
                switch (className) {
                    case "days": countdownElements[i].innerHTML = days; break;
                    case "hours": countdownElements[i].innerHTML = hours; break;
                    case "minutes": countdownElements[i].innerHTML = minutes; break;
                    case "seconds": countdownElements[i].innerHTML = seconds; break;
                }
            }
        }, 1000);
    </script>

@endsection

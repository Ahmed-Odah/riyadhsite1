@extends('layout.master')
@section('content')






        </section>
        <!--Javascript-->
        <script>
            // count-down timer
            let dest = new Date("mar 31, 2024 23:59:59").getTime();
            let x = setInterval(function () {
                let now = new Date().getTime();
                let diff = dest - now;
                // Check if the countdown has reached zero or negative
                if (diff <= 0) {
                    // Set the destination date to the same day next month
                    let nextMonthDate = new Date();
                    nextMonthDate.setMonth(nextMonthDate.getMonth() + 1);

                    // If the current month is December, set the destination date to the same day next year
                    if (nextMonthDate.getMonth() === 0) {
                        nextMonthDate.setFullYear(nextMonthDate.getFullYear() + 1);
                    }

                    dest = nextMonthDate.getTime();
                    return; // Exit the function
                }

                let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((diff % (1000 * 60)) / 1000);

                if (days < 10) {
                    days = `0${days}`;
                }

                if (hours < 10) {
                    hours = `0${hours}`;
                }
                if (minutes < 10) {
                    minutes = `0${minutes}`;
                }
                if (seconds < 10) {
                    seconds = `0${seconds}`;
                }

                // Get elements by class name
                let countdownElements = document.getElementsByClassName("countdown-element");

                // Loop through the elements and update their content
                for (let i = 0; i < countdownElements.length; i++) {
                    let className = countdownElements[i].classList[1]; // Get the second class name
                    switch (className) {
                        case "days":
                            countdownElements[i].innerHTML = days;
                            break;
                        case "hours":
                            countdownElements[i].innerHTML = hours;
                            break;
                        case "minutes":
                            countdownElements[i].innerHTML = minutes;
                            break;
                        case "seconds":
                            countdownElements[i].innerHTML = seconds;
                            break;
                        default:
                            break;
                    }
                }
            }, 10);
        </script>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">

            <div class="w-full ">
                <!-- عرض 3 أعمدة جنب بعض -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($blogs as $blog)
                        <div class="group">
                            <div class="flex items-center mb-9">
                                <img src="{{ asset('public/storage/' . $blog->image) }}" alt="blogs tailwind section" class="rounded-2xl w-full object-cover h-118">
                            </div>
                            <h3 class="text-xl text-gray-900 font-medium leading-8 mb-4 group-hover:text-indigo-900">{{ $blog->title }}</h3>
                            <p class="text-gray-500 leading-6 transition-all duration-500 mb-8">
                                {{ $blog->description }}
                            </p>
                            <a href="javascript:;" class="cursor-pointer flex items-center gap-2 text-lg text-indigo-900 font-semibold">
                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" class="rotate-180" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.25 6L13.25 6M9.5 10.5L13.4697 6.53033C13.7197 6.28033 13.8447 6.15533 13.8447 6C13.8447 5.84467 13.7197 5.71967 13.4697 5.46967L9.5 1.5" stroke="#312E81" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h1> إقرا آكثر</h1>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
    </section>
    --}}


@endsection

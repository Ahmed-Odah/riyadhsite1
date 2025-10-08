<style>
    .swiper-button-prev:after,
    .swiper-rtl .swiper-button-next:after {
        content: '' !important;
    }

    .swiper-button-next:after,
    .swiper-rtl .swiper-button-prev:after {
        content: '' !important;
    }

    .swiper-button-next svg,
    .swiper-button-prev svg {
        width: 24px !important;
        height: 24px !important;
    }

    .swiper-button-next,
    .swiper-button-prev {
        position: relative !important;
    }

    .swiper-slide.swiper-slide-active {
        --tw-border-opacity: 1 !important;
        border-color: rgb(79 70 229 / var(--tw-border-opacity)) !important;
    }

    .swiper-slide.swiper-slide-active>.swiper-slide-active\:text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    .swiper-slide.swiper-slide-active>.flex .grid .swiper-slide-active\:text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    /* ✅ الوصف فقط سطرين */
    .blog-description {
        display: -webkit-box;
        -webkit-line-clamp: 2; /* عدد الأسطر */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<section class="py-24" dir="">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">

            <div class="w-full flex flex-col justify-between items-start lg:w-2/5">
                <div class="block">
                    <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] mb-5">
                        آخر الآحداث <span class="text-indigo-900">المدونة</span>
                    </h2>
                    <p class="text-gray-500 mb-10 max-lg:max-w-xl max-lg:mx-auto">
                        هنا تجد مقالات وخواطر وملخصات من واقع تجربة وفكر، نشاركها معك لتكون أقرب لما نعيشه ونفكر فيه
                    </p>
                    <a href="javascript:;" class="cursor-pointer border border-gray-300 shadow-sm rounded-full py-3.5 px-7 w-52 lg:mx-0 mx-auto flex justify-center text-gray-900 font-semibold transition-all duration-300 hover:bg-gray-100">
                        شاهد الكل
                    </a>
                </div>

                <!-- Slider controls -->
                <div class="flex items-center lg:justify-start justify-center lg:mt-0 mt-8 gap-8 mb-4">
                    <button id="slider-button-right" class="swiper-button-next group border border-solid border-indigo-900 w-11 h-11 transition-all duration-500 rounded-full hover:bg-indigo-900" data-carousel-next>
                        <svg class="h-6 w-6 text-indigo-900 group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12L19 12M14 18L19.2929 12.7071C19.6262 12.3738 19.7929 12.2071 19.7929 12C19.7929 11.7929 19.6262 11.6262 19.2929 11.2929L14 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button id="slider-button-left" class="swiper-button-prev group border border-solid border-indigo-900 w-11 h-11 transition-all duration-500 rounded-full hover:bg-indigo-900" data-carousel-prev>
                        <svg class="h-6 w-6 text-indigo-900 group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.9999 12L4.99992 12M9.99992 6L4.70703 11.2929C4.3737 11.6262 4.20703 11.7929 4.20703 12C4.20703 12.2071 4.3737 12.3738 4.70703 12.7071L9.99992 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="w-full lg:w-3/5">
                <!--Slider wrapper-->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $blog)
                            <div class="swiper-slide w-full max-lg:max-w-xl lg:w-1/2 group">
                                <div class="flex items-center mb-9">
                                    <img src="{{asset('public/storage/' . $blog->image)}}" alt="blogs tailwind section" class="rounded-2xl w-full object-cover h-114">
                                </div>
                                <h3 class="text-xl text-gray-900 font-medium leading-8 mb-4 group-hover:text-indigo-900">{{ $blog->title }}</h3>
                                <p class="text-gray-500 leading-6 transition-all duration-500 mb-8 blog-description">
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
    </div>
</section>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 28,
        centeredSlides: false,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: false,
            },
            568: {
                slidesPerView: 2,
                spaceBetween: 28,
                centeredSlides: false,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 28,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 32,
            },
        },
    });
</script>

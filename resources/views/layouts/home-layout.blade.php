<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phapros Kehati</title>

    <script src="https://kit.fontawesome.com/c473da0646.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="./landingpage/css/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="./landingpage/vendors/slick/slick.css" />
    <link rel="stylesheet" href="./landingpage/vendors/slick/slick-theme.css" />

    <!-- Swiper CSS -->
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Style -->
    <link rel="stylesheet" href="./landingpage/css/style.css" />


    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500&display=swap" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="{{ asset('landingpage/images/logo_phapros.jpg') }}">
</head>

<body class="font-poppins text-zinc-800 overflow-x-hidden dark:bg-[#1b1b36] bg-zinc-50" id="top">
    <!-- Start Navbar -->
    <nav class="bg-white shadow p-4 sticky top-0 z-50 dark:bg-[#1b1b36]">
        <div class="container mx-auto">
            <div class="flex justify-between md:gap-10">
                <!-- nav -->
                <div class="flex items-center justify-center text-slate-800">
                    <div class="relative inline-flex min-w-max">
                        <a href="/">
                            <img src="{{ asset('landingpage/images/logo_phapros.jpg') }}" class="w-full h-12 dark:hidden"
                                alt="" />
                            <img src="{{ asset('landingpage/images/logo_dl_dark.png') }}"
                                class="hidden w-full h-12 dark:flex" alt="" />
                        </a>
                    </div>
                    <!-- kategori -->


                    <!-- langganan -->


                </div>

                <!-- searchbar -->


                <!--  masuk, daftar -->
                <div class="flex pr-0 my-auto md:pr-5">
                    @if (Auth::user())
                        <!-- dropdown avatar -->
                        <div class="mr-0 md:mr-5 my-auto">
                            <div x-data="{ open: false }" class="flex inline-flex items-center w-full">
                                <!-- close -->
                                <div @click="open = !open" class="relative border-b-4 border-transparent ">
                                    <div class="flex items-center justify-center space-x-3 cursor-pointer">
                                        <div
                                            class="w-11 h-11 overflow-hidden border-2 rounded-full border-slate-800 hover:opacity-90 dark:border-white ">
                                            @if (Auth::user()->photo != null)
                                                <img src="{{ asset(Storage::url(Auth::user()->photo)) }}" alt=""
                                                    class="object-cover w-full h-full">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff&rounded=true&bold=true"
                                                    alt="" class="object-cover w-full h-full">
                                            @endif

                                        </div>
                                        <div class="mx-auto font-semibold text-slate-800 dark:text-white">
                                            <div class="hidden cursor-pointer md:block">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- open -->
                                    <div x-show="open"
                                        class="absolute hidden mt-3 overflow-hidden rounded-lg shadow-md w-50 dark:bg-zinc-800 md:block"
                                        x-transition:enter="transition ease-out origin-top-left duration-200"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition origin-top-left ease-in duration-100"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90">
                                        <!-- dropdown -->
                                        <ul class="list-none">
                                            <li class="bg-white/70 backdrop-blur-lg">
                                                <a href="{{ route('dashboard') }}"
                                                    class="flex block gap-2 py-3 pl-5 pr-6 text-sm hover:bg-slate-50 hover:text-blue-500 dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700 dark:hover:text-blue-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    Dashboard
                                                </a>
                                            </li>

                                            <li class="bg-white/70 backdrop-blur-lg">
                                                @csrf
                                                <button data-modal-target="popup-modal-logout"
                                                    data-modal-toggle="popup-modal-logout"
                                                    class="flex block w-full gap-2 py-3 pl-5 pr-6 text-sm hover:bg-slate-50 hover:border-red-600 hover:text-red-600 dark:text-white dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:hover:text-red-500"
                                                    type="button">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                        </path>
                                                    </svg>
                                                    Keluar
                                                </button>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <!-- open mobile -->
                                <div x-show="open"
                                    class="absolute right-10 block mt-10 text-left bg-white shadow top-10 overflow-y md:hidden"
                                    x-transition:enter="transition ease-out origin-top-left duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition origin-top-left ease-in duration-100"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-90">
                                    <!-- dropdown -->
                                    <ul class="list-none">
                                        <li class="bg-white/70 backdrop-blur-lg">
                                            <a href="{{ route('dashboard') }}"
                                                class="flex block gap-2 py-3 pl-5 pr-6 text-sm hover:bg-slate-50 hover:text-blue-500 dark:bg-zinc-800 dark:text-white dark:hover:bg-zinc-700 dark:hover:text-blue-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>

                                        <li class="bg-white/70 backdrop-blur-lg">
                                            @csrf
                                            <button data-modal-target="popup-modal-logout"
                                                data-modal-toggle="popup-modal-logout"
                                                class="flex block w-full gap-2 py-3 pl-5 pr-6 text-sm hover:bg-slate-50 hover:border-red-600 hover:text-red-600 dark:text-white dark:bg-zinc-800 dark:hover:bg-zinc-700 dark:hover:text-red-500"
                                                type="button">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                Keluar
                                            </button>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @else
                        <!-- button masuk -->



                        <!-- button daftar -->

                    @endif

                    <!-- tombol switch theme -->


                    <!-- end tombol switch theme -->

                    <!-- nav toggle mobile -->
                    <div class="my-auto ml-3 cursor-pointer lg:hidden block">
                        <span class="navbar-toggle
                        dark:text-white text-slate-900 lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!-- mobile nav -->
        <div
            class="mobile-navbar hidden h-[102vh] bg-white absolute top-0 left-0 text-left shadow overflow-y dark:bg-zinc-800">
            <div class="p-3">
                <!-- search bar -->
                <div class="relative mt-3">
                    <span class="absolute left-3.5 top-3.5 text-slate-600 dark:text-zinc-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <form action="{{ route('course.search') }}">
                        <input type="search" name="search"
                            class="transition w-full text-xs rounded-full border-1 border-zinc-500 p-4 pl-12 bg-slate-100 outline-none dark:bg-[#303150] dark:text-white"
                            placeholder="Cari Materi.." />
                    </form>
                </div>
                <ul class="mt-3 list-none">
                    <li class="py-3">
                        <div class="flex items-center justify-between w-full" onclick="dropDown()">
                            <span
                                class="text-[15px] ml-2 text-slate-800 font-semibold dark:text-white ">Kategori</span>
                            <span class="text-sm rotate-180 text-slate-800 font-semibold dark:text-white"
                                id="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                        <div class="w-4/5 mx-auto mt-1 text-sm font-normal text-left text-slate-800 dark:text-white"
                            id="submenu">
                            <ul class="list-none">
                                @foreach ($categories as $category)
                                    <li class="">
                                        <a href="{{ route('category.show', [$category->id]) }}"
                                            class="block py-2 text-sm bg-white hover:bg-slate-50 hover:text-blue-600 dark:bg-zinc-800 dark:hover:bg-zinc-700">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="py-3">
                        <div class="flex items-center justify-between w-full">
                            <a href="#mentor"
                                class="text-[15px] ml-2 text-slate-800 font-semibold dark:text-white">Mentor</a>
                            <span class="text-sm mr-2 text-slate-800 font-semibold dark:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </span>
                        </div>
                    </li>
                </ul>
                @if (!Auth::user())
                    <div class="flex mt-5 gap-2">
                        <!-- button masuk -->
                        <div class="relative">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center w-full px-6 py-3 text-sm font-medium text-black align-middle rounded-full select-none bg-zinc-200 dark:bg-zinc-100 border-slate-800 sm:mb-0 sm:w-auto hover:bg-zinc-300 dark:hover:bg-zinc-200 ">
                                Masuk
                            </a>
                        </div>
                        <!-- button daftar -->
                        <div class="relative">
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center w-full px-6 py-3 text-sm font-medium text-white align-middle bg-blue-600 rounded-full select-none sm:mb-0 sm:w-auto hover:opacity-95">
                                Daftar
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    @yield('body')

    <!-- Start Footer Section -->
    <footer class="bg-blue-800 dark:bg-[#1b1b36] py-2">

            <div class="text-white text-center">2024 copyright PT Phapros Tbk</div>

    </footer>
    <!-- End Footer Section -->

    {{-- start modal logout --}}
    <div id="popup-modal-logout" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-sm max-h-full">
            <div class="relative bg-white shadow rounded-xl dark:bg-zinc-800">
                <div class="px-0 pt-6 pb-0 text-center dark:text-white">
                    <h1 class="my-2 text-xl font-medium text-center">Keluar</h1>
                    <h3 class="mt-2 mb-5 text-sm font-normal text-zinc-500 dark:text-zinc-400">Anda yakin ingin keluar?
                    </h3>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        {{-- <button type="submit"
                            class="text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            iyah
                        </button> --}}
                        <div class="flex w-full gap-2 p-2">
                            <button data-modal-hide="popup-modal-logout" type="button"
                                class="w-full overflow-hidden text-sm rounded-lg text-zinc-500 bg-zinc-200 hover:bg-zinc-100 focus:ring-4 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600">
                                <div class="px-5 py-2 rounded-lg bg-zinc-200 dark:bg-zinc-700">
                                    Batal
                                </div>
                            </button>
                            <button type="submit"
                                class="z-50 w-full overflow-hidden text-sm rounded-lg text-zinc-500 focus:ring-4 focus:outline-none focus:ring-zinc-200 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600">
                                <div class="px-5 py-2 text-white bg-red-600 ">
                                    Keluar
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal logout --}}

    {{-- flowbite script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

    <!-- Scripts -->
    <!-- Jquery JS -->
    <script src="{{ asset('landingpage/vendors/jquery/jquery-3.6.0.min.js') }}"></script>

    <!-- Slick Carousel JS -->
    <script src="{{ asset('landingpage/vendors/slick/slick.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function dropDown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }
        dropDown();

        function Openbar() {
            document.querySelector(".sidebar").classList.toggle("left-[-300px]");
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-container', {
                autoplay: {
                    delay: 8000,
                },
                breakpoints: {
                    640: {
                        centeredSlides: true,
                        slidesPerView: 1.25,
                    },
                    1024: {
                        centeredSlides: false,
                        slidesPerView: 1.5,
                    },
                },
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
            })
        })

        var swiper2 = new Swiper(".swiper-container-2", {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                520: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                },
                950: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
    </script>

    <style>
        .nav-btn {
            color: black;
            height: 50px;
            width: 50px;
            /* margin-inline: -10px; */
        }

        .nav-btn::after,
        .nav-btn::before {
            font-size: 20px !important;
            font-weight: bolder;
        }
    </style>
</body>

</html>

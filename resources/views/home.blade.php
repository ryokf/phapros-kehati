@extends('layouts.home-layout')
@section('body')
    <!-- Start Header / Hero Section -->
    <header class="bg-no-repeat bg-cover"
        style="
 background-image: url('landingpage/images/header_phapros.jpg');
 background-attachment: fixed;
 background-position: center;
">
        <div class="w-full py-20 md:py-36 bg-zinc-800 bg-opacity-80">
            <div class="px-10 lg:px-60 py-36">

                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-1 pb-1 md:pb-0 text-white">
                    PT Phapros Tbk
                </h2>
                {{-- <h2 class="font-semibold text-4xl pb-3 md:pb-0 dark:text-white dark:font-bold">Learning Platfrom</h2> --}}
                <p class=" text-zinc-200 font-light text-sm md:text-base lg:text-xl max-w-3xl my-3 px-0 md:mt-4 mt-1">
                    Menjadi perusahaan farmasi terkemuka yang menghasilkan produk kesehatan terbaik guna meningkatkan
                    kualitas hidup masyarakat.
                </p>
            </div>
            <!-- button mulai belajar -->
            {{-- <a href="#categories"
                class="relative inline-flex items-center justify-center p-4 px-7 py-3 overflow-hidden font-medium text-white transition duration-300 ease-out border-2 border-zinc-400 rounded-full group md:mt-5 mt-1 dark:border-slate-100">
                <span
                    class="absolute inset-0 flex items-center justify-center w-full h-full text-zinc-200 duration-300 -translate-x-full bg-zinc-700 dark:bg-zinc-800 group-hover:translate-x-0 ease">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </span>
                <span
                    class="absolute flex items-center justify-center w-full h-full text-zinc-600 transition-all duration-300 transform group-hover:translate-x-full ease dark:text-white">Mulai
                    Belajar</span>
                <span class="relative invisible dark:text-white">Mulai Belajar</span>
            </a> --}}
        </div>
        <!--  -->

        <!--  -->
    </header>
    <!-- End Header / Hero Section -->

    <!-- Start Categories By Divisi Section -->
    <section id="categories">
        <div class="container mx-auto my-20">
            <h2 class="font-medium text-3xl mt-12 text-center text-orange-500 dark:text-white">
                Tentang kami
            </h2>
            <div class="flex justify-center mt-4 mb-12">
                <hr class="w-10 border-blue-500 border-2" />
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 w-10/12 m-auto">
                <div class="col-span-1 m-auto md:w-3/4 md:h-3/4  xl:w-full xl:h-full  rounded-xl overflow-hidden">
                    <img class="w-full h-full " src="{{ asset('landingpage/images/tentang_phapros.png') }}" alt="">
                </div>
                <div class="xl:col-span-2 py-4 bg-slate-100">
                    <p class="text-sm"><span class="ml-8"></span>PT Phapros Tbk berada di Jl. Simongan No. 131, Bongsari,
                        Kec. Semarang Barat, Jawa Tengah. Pada
                        tanggal 21 Juni 1954 PT. Phapros Tbk, didirikan oleh NV. Kian Gwan Handels Maatschappy (Prof. Liem
                        Wie Hock). PT Phapros Tbk termasuk bagian Oei Tiong Ham Concern (OTHC), yang merupakan konglomerat
                        pertama di Indonesia yang bergerak di bisnis gula dan agroindustry. Nama awal dari PT Phapros Tbk
                        adalah NV Pharmaceutical Processing Industries, yang kemudian disingkat menjadi Phapros.</p>
                    <br>
                    <p class="text-sm"><span class="ml-8"></span>Pada awalnya, OTHC memiliki 96% saham Phapros namun
                        seiring perkembangan kepemilikan dari saham
                        Phapros berubah, saat ini 54% saham dari PT Phapros Tbk dimiliki oleh PT. Rajawali Nusantara
                        Indonesia yaitu BUMN dibawah Departemen Keuangan dan 46% lainnya dimiliki oleh masyarakat umum,
                        terutama dari kalangan dokter, apoteker dan professional lainnya yang ada di bidang kesehatan yng
                        berjumlah 300 orang. Di tahun 2018 saham yang dimiliki PT Rajawali Nusantara Indonesia diakuisisi
                        oleh PT Kimia Farma (Persero) Tbk (KAEF) sebesar 56,77% atau 476.901.860 saham. Akuisisi Phapros
                        oleh KAEF ini merupakan langkah awal yang paralel dengan langkah holding farmasi. Hingga saat ini PT
                        Phapros Tbk telah memproduksi kurang lebih 284 macam produk.</p>
                </div>
            </div>

            {{-- <div class="grid grid-cols-2 lg:grid-cols-6 gap-3 items-center text-center ">
                @foreach ($categories as $number => $category)
                    <!-- Start Single Category Item -->
                    <a href="{{ route('category.show', $category->id) }}"
                        class="
                        @if ($number == 0 || $number == 3) {{ 'bg-gradient-to-br from-sky-300 via-10% to-blue-600' }}
                        @elseif ($number == 1 || $number == 4)
                            {{ 'bg-gradient-to-br from-orange-300 via-10% to-amber-600 ' }}
                        @else
                            {{ 'bg-gradient-to-br from-green-300 via-10% to-emerald-600 ' }} @endif
                     transition basis-[45%] md:basis-[10.93%]  cursor-pointer rounded-lg  p-5 hover:opacity-75 group hover:-translate-y-2 h-full dark:bg-zinc-200">
                        <div class="bg-white rounded-full m-0 mx-auto w-20 h-20 p-2.5 scale-90 group-hover:scale-100">
                            <img src="{{ $category->photo }}" alt="" class="w-16 h-16" />
                        </div>
                        <h4 class="mt-4 mb-2 font-medium text-white">{{ $category->name }}</h4>
                        <p class="text-zinc-300 text-xs">{{ count($category->course) }} kursus</p>
                    </a>
                    <!-- End Single Category Item -->
                @endforeach
            </div> --}}
        </div>
    </section>
    <!-- End Categories By Divisi Section -->

    <!-- Start New Courses Section -->
    <section id="courses" class="bg-blue-700 mt-40">
        <div class="container mx-auto py-10">
            <h2 class="font-bold text-3xl text-center mb-4 text-white">Artikel kami</h2>
            <p class="mb-10 text-center text-white opacity-70">Artikel terbaru kami yang selalu up-to-date</p>
            <div class="swiper swiper-container-2 slide-container py-3 px-10">
                <div class="swiper-wrapper">
                    {{-- @foreach ($latestCourse as $course) --}}
                    <div class="swiper-slide">
                        <x-course-card id="1" />
                    </div>
                    {{-- @endforeach --}}
                </div>

                <div class="swiper-button-next rounded-full bg-slate-100 nav-btn"></div>
                <div class="swiper-button-prev rounded-full bg-slate-100 nav-btn"></div>


            </div>
        </div>
    </section>
    <!-- End New Courses Section -->

    <!-- Start Popular Courses Section -->
    <!-- End Popular Courses Section -->

    <!-- Start FAQ Section -->

    <!-- End FAQ Section -->

    <!-- Start Testimoni Section -->

    <!-- End Testimoni Section -->

    <!-- Start Mentor Section -->


    <!-- End Mentor Section -->
@endsection()

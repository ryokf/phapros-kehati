{{-- @dd($data) --}}

@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu />

    <div class="relative md:ml-72 bg-blueGray-50">
        <x-dashboard-header />
        <div class="relative md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    <!-- Card stats -->
                    <div class="flex flex-wrap">
                        <x-stastitic-card title="jumlah kursus" value="{{ count($data['course']) }}" icon='fa-solid fa-book'
                            iconBgColor="icon bg-gradient-to-bl from-orange-300 via-10% to-yellow-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ $data['coursePercentage'][0] }}" arrow="{{ $data['coursePercentage'][1] }}" />
                        <x-stastitic-card title="jumlah materi" value="{{ $data['lesson_count'] }}"
                            icon='fa-solid fa-scroll'
                            iconBgColor="icon bg-gradient-to-bl from-violet-300 via-10% to-purple-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ $data['lessonPercentage'][0] }}" arrow="{{ $data['lessonPercentage'][1] }}" />
                        <x-stastitic-card title="jumlah transaksi" value="{{ $data['member_count'] }}"
                            icon='fa-solid fa-users-rectangle'
                            iconBgColor="icon bg-gradient-to-bl from-cyan-300 via-10% to-blue-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ $data['transactionPercentage'][0] }}"
                            arrow="{{ $data['transactionPercentage'][1] }}" />
                        <x-stastitic-card title="pemasukan bulan ini" value="Rp{{ $data['income'] }}"
                            icon='fa-solid fa-rupiah-sign'
                            iconBgColor="icon bg-gradient-to-bl from-green-300 via-10% to-emerald-400 shadow-inner shadow-xs shadow-zinc-200"
                            percentage="{{ $data['incomePercentage'][0] }}" arrow="{{ $data['incomePercentage'][1] }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full mb-12 xl:mb-0 px-4">
                    <div
                        class="w-full min-h-fit bg-white rounded-xl shadow hover:shadow-lg transition dark:bg-[#303150] p-4 md:p-6 md:py-4 relative">
                        <div class="flex justify-between">
                            <div class="mb-1">
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">Ringkasan</p>
                                <h5 class="leading-none text-xl font-bold dark:text-white pb-2">Stasitik pembelian kursus</h5>
                            </div>
                            <div
                                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            </div>
                        </div>
                        <div id="line-chart"></div>
                        <div
                            class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-end items-center pt-4">
                                <a href="#"
                                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                    Daftar transaksi
                                    <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mt-4">
                    <div class="w-full mb-12">
                        <div class="flex flex-wrap mt-4">
                            <div class="w-full xl:w-7/12 mb-12 xl:mb-0 px-4 dark:text-white">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white dark:bg-[#303150] w-full mb-6 shadow-lg rounded">
                                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                                        <div class="flex flex-wrap items-center">
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                                <h3 class="font-semibold text-base text-blueGray-700">
                                                    Kursus dengan pembeli terbanyak bulan ini
                                                </h3>
                                            </div>
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                                <a href="author/course"
                                                    class="bg-primary text-white active:bg-neutral-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 dark:text-zinc-400"
                                                    type="button">
                                                    lihat semua
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block w-full overflow-x-auto">
                                        <!-- Projects table -->
                                        <table class="items-center w-full bg-transparent border-collapse">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        Kursus
                                                    </th>
                                                    <th
                                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        kategori
                                                    </th>
                                                    <th
                                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        status
                                                    </th>
                                                    <th
                                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        jumlah anggota
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['course_top_bought'] as $top)
                                                    <tr>
                                                        <th
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                            {{ $top->title }}
                                                        </th>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 dark:text-zinc-400">
                                                            {{ $top->category->name }}
                                                        </td>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 dark:text-zinc-400">
                                                            {{ $top->status }}
                                                        </td>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 dark:text-zinc-400">
                                                            {{ count($top->userCourse) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full xl:w-5/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white dark:bg-[#303150] w-full mb-6 shadow-lg rounded dark:text-white">
                                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                                        <div class="flex flex-wrap items-center">
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                                <h3 class="font-semibold text-base text-blueGray-700">
                                                    kursus dengan lulusan terbanyak bulan ini
                                                </h3>
                                            </div>
                                            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                                <a href="/author/course"
                                                    class="bg-primary text-white active:bg-neutral-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 dark:text-zinc-400"
                                                    type="button">
                                                    lihat semua
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block w-full overflow-x-auto">
                                        <!-- Projects table -->
                                        <table class="items-center w-full bg-transparent border-collapse">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th
                                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        kursus
                                                    </th>
                                                    <th
                                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        kategori
                                                    </th>
                                                    <th
                                                        class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                        jumlah anggota
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['course_top_pass'] as $top)
                                                    <tr>
                                                        <th
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                            {{ $top->title }}
                                                        </th>
                                                        <td
                                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 dark:text-zinc-400">
                                                            {{ $top->category->name }}
                                                        </td>
                                                        <td class="text-center dark:text-zinc-400">
                                                            {{ count($top->userCourse) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-12 xl:mb-0 px-4">
                                <div
                                    class="invisible bg-white relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                                    <div class="p-4 flex-auto ">
                                        <!-- Chart -->
                                        <div class="relative h-350-px ">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="line-chart" style="display: block; width: 599px; height: 1px;"
                                                width="599" height="350" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-dashboard-footer />
        </div>

        <x-bottom-nav-bar :menu="$menu"></x-bottom-nav-bar>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script> --}}
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                let options = {
                    chart: {
                        height: "100%",
                        maxWidth: "100%",
                        type: "area",
                        fontFamily: "Inter, sans-serif",
                        dropShadow: {
                            enabled: false,
                        },
                        toolbar: {
                            show: false,
                        },
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            opacityFrom: 0.55,
                            opacityTo: 0,
                            shade: "#1C64F2",
                            gradientToColors: ["#1C64F2"],
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 3,
                    },
                    grid: {
                        show: true,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: 0
                        },
                    },
                    series: [{
                        name: "pembelian",
                        data: [
                            @foreach ($data['buyer_count'] as $count)
                                {{ $count . ',' }}
                            @endforeach
                        ],
                        color: "#38bdf8",
                    }, {
                        name: "kelulusan",
                        data: [
                            @foreach ($data['graduate_count'] as $count)
                                {{ $count . ',' }}
                            @endforeach
                        ],
                        color: "#fb923c",
                    }],
                    xaxis: {
                        categories: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "Mei",
                            "Jun",
                            "Jul",
                            "Agu",
                            "Sep",
                            "Okt",
                            "Nov",
                            "Des"
                        ],
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                            }
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: true,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                            },
                            formatter: function(value) {
                                return value + " "
                            },
                        },
                    },
                }

                if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("line-chart"), options);
                    chart.render();
                }
            });
        </script>

        <script type="text/javascript">
            /* Make dynamic date appear */
            (function() {
                if (document.getElementById("get-current-year")) {
                    document.getElementById("get-current-year").innerHTML =
                        new Date().getFullYear();
                }
            })();
            /* Sidebar - Side navigation menu on mobile/responsive mode */
            function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("bg-white");
                document.getElementById(collapseID).classList.toggle("m-2");
                document.getElementById(collapseID).classList.toggle("py-3");
                document.getElementById(collapseID).classList.toggle("px-6");
            }
            /* Function for dropdowns */
            function openDropdown(event, dropdownID) {
                let element = event.target;
                while (element.nodeName !== "A") {
                    element = element.parentNode;
                }
                Popper.createPopper(element, document.getElementById(dropdownID), {
                    placement: "bottom-start",
                });
                document.getElementById(dropdownID).classList.toggle("hidden");
                document.getElementById(dropdownID).classList.toggle("block");
            }


            // (function() {
            //     /* Chart initialisations */
            //     /* Line Chart */
            //     var config = {
            //         type: "bar",
            //         data: {
            //             labels: [
            //                 "Jan",
            //                 "Feb",
            //                 "Mar",
            //                 "Apr",
            //                 "Mei",
            //                 "Jun",
            //                 "Jul",
            //                 "Agu",
            //                 "Sep",
            //                 "Okt",
            //                 "Nov",
            //                 "Des"
            //             ],
            //             datasets: [{
            //                     label: "pembeli",
            //                     fill: false,
            //                     backgroundColor: "#4f46e5",
            //                     borderColor: "#4f46e5",
            //                     data: [
            //                         @foreach ($data['buyer_count'] as $count)
            //                             {{ $count . ',' }}
            //                         @endforeach
            //                     ],
            //                 },
            //                 {
            //                     label: "lulusan",
            //                     fill: false,
            //                     backgroundColor: "#db2777",
            //                     borderColor: "#db2777",
            //                     data: [
            //                         @foreach ($data['graduate_count'] as $count)
            //                             {{ $count . ',' }}
            //                         @endforeach
            //                     ],
            //                 },
            //             ],
            //         },
            //         options: {
            //             maintainAspectRatio: false,
            //             responsive: true,
            //             title: {
            //                 display: false,
            //                 text: "Sales Charts",
            //                 fontColor: "black",
            //             },
            //             legend: {
            //                 labels: {
            //                     fontColor: "black",
            //                 },
            //                 align: "end",
            //                 position: "bottom",
            //             },
            //             tooltips: {
            //                 mode: "index",
            //                 intersect: false,
            //             },
            //             hover: {
            //                 mode: "nearest",
            //                 intersect: true,
            //             },
            //             scales: {
            //                 xAxes: [{
            //                     ticks: {
            //                         fontColor: "black",
            //                     },
            //                     display: true,
            //                     scaleLabel: {
            //                         display: false,
            //                         labelString: "Month",
            //                         fontColor: "black",
            //                     },
            //                     gridLines: {
            //                         display: false,
            //                         borderDash: [2],
            //                         borderDashOffset: [2],
            //                         color: "black",
            //                         zeroLineColor: "rgba(0, 0, 0, 0)",
            //                         zeroLineBorderDash: [2],
            //                         zeroLineBorderDashOffset: [2],
            //                     },
            //                 }, ],
            //                 yAxes: [{
            //                     ticks: {
            //                         fontColor: "black",
            //                     },
            //                     display: true,
            //                     scaleLabel: {
            //                         display: false,
            //                         labelString: "Value",
            //                         fontColor: "black",
            //                     },
            //                     gridLines: {
            //                         borderDash: [3],
            //                         borderDashOffset: [3],
            //                         drawBorder: false,
            //                         color: "black",
            //                         zeroLineColor: "black",
            //                         zeroLineBorderDash: [2],
            //                         zeroLineBorderDashOffset: [2],
            //                     },
            //                 }, ],
            //             },
            //         },
            //     };
            //     var ctx = document.getElementById("line-chart").getContext("2d");
            //     window.myLine = new Chart(ctx, config);

            //     var config = {
            //         type: "line",
            //         data: {
            //             labels: [
            //                 "Jan",
            //                 "Feb",
            //                 "Mar",
            //                 "Apr",
            //                 "Mei",
            //                 "Jun",
            //                 "Jul",
            //                 "Agu",
            //                 "Sep",
            //                 "Okt",
            //                 "Nov",
            //                 "Des"
            //             ],
            //             datasets: [{
            //                 label: "pemasukan",
            //                 fill: false,
            //                 backgroundColor: "#10b981",
            //                 borderColor: "#10b981",
            //                 borderWidth: 5,
            //                 data: [
            //                     @foreach ($data['income_per_month'] as $count)
            //                         {{ $count . ',' }}
            //                     @endforeach
            //                 ],
            //                 tension: 0.2,
            //             }, ],
            //         },
            //         options: {
            //             maintainAspectRatio: false,
            //             responsive: true,
            //             title: {
            //                 display: false,
            //                 text: "Sales Charts",
            //                 fontColor: "black",
            //             },
            //             legend: {
            //                 labels: {
            //                     fontColor: "black",
            //                 },
            //                 align: "end",
            //                 position: "bottom",
            //             },
            //             tooltips: {
            //                 mode: "index",
            //                 intersect: false,
            //             },
            //             hover: {
            //                 mode: "nearest",
            //                 intersect: true,
            //             },
            //             scales: {
            //                 xAxes: [{
            //                     ticks: {
            //                         fontColor: "black",
            //                     },
            //                     display: true,
            //                     scaleLabel: {
            //                         display: false,
            //                         labelString: "Month",
            //                         fontColor: "black",
            //                     },
            //                     gridLines: {
            //                         display: false,
            //                         borderDash: [2],
            //                         borderDashOffset: [2],
            //                         color: "black",
            //                         zeroLineColor: "rgba(0, 0, 0, 0)",
            //                         zeroLineBorderDash: [2],
            //                         zeroLineBorderDashOffset: [2],
            //                     },
            //                 }, ],
            //                 yAxes: [{
            //                     ticks: {
            //                         fontColor: "black",
            //                         callback: function(value, index, values) {
            //                             return 'Rp' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
            //                                 ".");
            //                         }
            //                     },
            //                     display: true,
            //                     scaleLabel: {
            //                         display: false,
            //                         labelString: "Value",
            //                         fontColor: "black",
            //                     },
            //                     gridLines: {
            //                         borderDash: [3],
            //                         borderDashOffset: [2],
            //                         drawBorder: false,
            //                         color: "black",
            //                         zeroLineColor: "black",
            //                         zeroLineBorderDash: [2],
            //                         zeroLineBorderDashOffset: [2],
            //                     },
            //                 }, ],
            //             },
            //         },
            //     };
            //     var ctx = document.getElementById("income-chart").getContext("2d");
            //     window.myLine = new Chart(ctx, config);


            // })();
        </script>


    @endsection

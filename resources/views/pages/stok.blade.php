@php
    $nav = 'stok';
@endphp

@extends('layout')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen lg:pb-0 lg:px-6">
            <div class="mx-auto max-w-screen-xl">

                <p class="mb-4 text-3xl text-center tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">
                    Infografis</p>
                <p class="mb-4 text-lg text-center text-gray-500 dark:text-gray-400">Berikut merupakan grafik dari stok darah
                </p>

                <div class="lg:mx-16 mx-4 mt-8 grid gap-2 mb-6 md:grid-cols-3">
                    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                        <div class="flex justify-between mb-3">
                            <div class="flex justify-center items-center">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Stok Darah</h5>
                                <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                </svg>
                                <div data-popover id="chart-info" role="tooltip"
                                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Jumlah stok darah</h3>
                                        <p>Jumlah stok darah yang ditampilkan adalah jumlah sisa stok darah masuk yang masih
                                            tersedia. <b>sisa stok = jumlah darah masuk - jumlah darah keluar</b></p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </div>
                        </div>


                        <!-- Donut Chart -->
                        <div class="py-6 grid grid-cols-1" id="donut-chart"></div>

                        {{-- <div class=" items-center border-gray-200 border-t dark:border-gray-700 justify-between">
        </div> --}}
                    </div>

                    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 md:col-span-2">
                        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                        <path
                                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                        <path
                                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">
                                        {{ $jumlah_pendonor }}</h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Jumlah pendonor yang
                                        terdaftar</p>
                                </div>
                            </div>
                            <div>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                    </svg>
                                    42.5%
                                </span>
                            </div>
                        </div>

                        <div id="column-chart"></div>
                        <div class="grid grid-cols-1 items-center justify-between"></div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                    <script>
                        // ApexCharts options and config
                        window.addEventListener("load", function() {
                            const options = {
                                colors: ["#1A56DB", "#FDBA8C"],
                                series: [
                                    @foreach ($stok_darah_2 as $value)
                                        {
                                            name: '{{ $value['name'] }}',
                                            color: '{{ $value['color'] }}',
                                            data: [{
                                                    x: "{{ $jenis_darah[0] }}",
                                                    y: '{{ $value['data'][0] ?? 0 }}'
                                                },
                                                {
                                                    x: "{{ $jenis_darah[1] }}",
                                                    y: '{{ $value['data'][1] ?? 0 }}'
                                                },
                                                {
                                                    x: "{{ $jenis_darah[2] }}",
                                                    y: '{{ $value['data'][2] ?? 0 }}'
                                                },
                                                {
                                                    x: "{{ $jenis_darah[3] }}",
                                                    y: '{{ $value['data'][3] ?? 0 }}'
                                                },
                                            ],
                                        },
                                    @endforeach
                                ],
                                chart: {
                                    type: "bar",
                                    height: "320px",
                                    fontFamily: "Inter, sans-serif",
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        columnWidth: "70%",
                                        borderRadiusApplication: "end",
                                        borderRadius: 8,
                                    },
                                },
                                tooltip: {
                                    shared: true,
                                    intersect: false,
                                    style: {
                                        fontFamily: "Inter, sans-serif",
                                    },
                                },
                                states: {
                                    hover: {
                                        filter: {
                                            type: "darken",
                                            value: 1,
                                        },
                                    },
                                },
                                stroke: {
                                    show: true,
                                    width: 0,
                                    colors: ["transparent"],
                                },
                                grid: {
                                    show: false,
                                    strokeDashArray: 4,
                                    padding: {
                                        left: 2,
                                        right: 2,
                                        top: -14
                                    },
                                },
                                dataLabels: {
                                    enabled: false,
                                },
                                legend: {
                                    show: false,
                                },
                                xaxis: {
                                    floating: false,
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
                                    show: false,
                                },
                                fill: {
                                    opacity: 1,
                                },
                            }

                            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                                chart.render();
                            }
                        });
                    </script>



                </div>
            </div>
        </div>
    </section>

    <script>
        // ApexCharts options and config
        window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: {{ $stok_darah == '[]' ? '[0,0,0,0]' : $stok_darah }},
                    colors: ["#FF5A5F", "#FFC371", "#74B9FF", "#4BC08F"],
                    chart: {
                        height: 320,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },
                                    total: {
                                        showAlways: true,
                                        show: true,
                                        label: "Darah",
                                        fontFamily: "Inter, sans-serif",
                                        formatter: function(w) {
                                            const sum = w.globals.seriesTotals.reduce((a, b) => {
                                                return a + b
                                            }, 0)
                                            return `${sum} kolf`
                                        },
                                    },
                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,
                                        formatter: function(value) {
                                            return value + " kolf"
                                        },
                                    },
                                },
                                size: "80%",
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: -2,
                        },
                    },
                    labels: ["A", "B", "AB", "O"],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + " kolf"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + " kolf"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                chart.render();
            }
        });
    </script>
@endsection

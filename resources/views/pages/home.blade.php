@php
    $nav = 'home';
@endphp

@extends('layout')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl lg:px-32 dark:text-white">
                <span class="text-rose-600">Donor Darah</span>: Cara Mudah Membantu Sesama
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Darahku adalah
                aplikasi dan portal informasi yang dikemas untuk memudahkan pelayanan darah transfusi melalui PMI di
                Kota Jayapura.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="/donor"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:ring-rose-300 dark:focus:ring-rose-900">
                    Info Donor
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="/about"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Selengkapnya
                </a>
            </div>

            <div class="px-4 mt-8 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
                <span class="font-semibold text-gray-400 uppercase">DIDUKUNG OLEH</span>
                <div class="flex flex-wrap justify-center items-center mt-8 text-gray-500">
                    <a href="https://www.pmi.or.id/" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">
                        <img src="/upload/images/logo-pmi.jpg" alt="logo pmi" class="h-32">
                    </a>
                    <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">
                        <img src="/upload/images/logo-kota-jayapura.jpg" alt="logo kota jayapura" class="h-32">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-rose-600 dark:bg-gray-900">
        <div class="gap-16 items-center py-16 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class=" text-white text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold dark:text-white">Mengapa Penting dan Bagaimana Cara
                    Melakukannya</h2>
                <p class="mb-4">Donor darah adalah proses menyumbangkan darah secara sukarela untuk membantu orang lain
                    yang membutuhkannya. Donor darah memiliki banyak manfaat, baik bagi penerima maupun pendonor. Beberapa
                    manfaat donor darah adalah:
                <ul class="max-w space-y-1 text-white list-disc list-inside" style="text-indent:-25px; margin-left:20px;">
                    <li>Membantu menyelamatkan nyawa orang yang mengalami kehilangan darah akibat kecelakaan, operasi, atau
                        penyakit.</li>
                    <li>Meningkatkan kesehatan jantung dan pembuluh darah, karena donor darah dapat mengurangi kekentalan
                        darah dan menurunkan risiko penyakit kardiovaskular.</li>
                    <li>Mendeteksi adanya penyakit atau infeksi yang mungkin tidak disadari, karena sebelum donor darah,
                        pendonor akan menjalani pemeriksaan kesehatan dan tes laboratorium.</li>
                    <li>Mendapatkan sertifikat donor darah dan kartu donor darah yang dapat digunakan sebagai identitas diri
                        atau syarat administrasi tertentu.</li>
                </ul>
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="/upload/images/donor-darah-foto.webp" alt="gambar proses donor darah">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="/upload/images/donor-darah-jantung.webp"
                    alt="gamabr jantung">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Informasi Donor</h2>
                <p class="font-normal text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Cek jadwal donor terdekat</p>
            </div>
            <div class="grid gap-8 mb-6 md:grid-cols-3">

                @foreach ($donor as $item)
                    <div
                        class="min-w-sm w-full mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <iframe class="rounded-t-lg w-full"
                            src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAPS_API_KEY') }}
            &q={{ $item->lat }},{{ $item->lng }}&region=id"
                            height="250" style="border:0;" allowfullscreen="true" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->kegiatan }}</h5>
                            </a>
                            <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400 mb-4">
                                <li class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-2 text-gray-500 dark:text-gray-400 flex-shrink-0"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z" />
                                    </svg>
                                    {{ date('d F Y', strtotime($item->tanggal)) }}
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-2 text-gray-500 dark:text-gray-400 flex-shrink-0"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    {{ date('H:i', strtotime($item->waktu)) }} WIT
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-2 text-gray-500 dark:text-gray-400 flex-shrink-0"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 16 20">
                                        <path
                                            d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                    </svg>
                                    {{ $item->tempat }}
                                </li>
                            </ul>
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $item->lat }}%2C{{ $item->lng }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-rose-600 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                Lihat di maps
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900" id="contact">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact kami
            </h2>
            <p class="mb-8 lg:mb-16 font-normal text-center text-gray-500 dark:text-gray-400 sm:text-xl">Ada pertanyaan ?
                Silahkan beritahu kami melaului form dibawah ini.</p>
            <form action="pesan" method="POST" class="space-y-8">
                @csrf
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input name="email" type="email" id="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500 dark:shadow-sm-light"
                        placeholder="nama@domain.com" required>
                </div>
                <div>
                    <label for="subject"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                    <input name="subject" type="text" id="subject"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-rose-500 focus:border-rose-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500 dark:shadow-sm-light"
                        placeholder="Beritahu kami bagaimana kami dapat membantu Anda" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pesan</label>
                    <textarea name="message" id="message" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-rose-500 focus:border-rose-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-rose-500 dark:focus:border-rose-500"
                        placeholder="Tulis pesanmu.."></textarea>
                </div>
                <button type="submit"
                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-rose-600 sm:w-fit hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">Kirim
                    pesan</button>
            </form>
        </div>

    </section>
@endsection

@php
    $nav = 'about';

    $faq = [
        [
            "pertanyaan" => "Apa itu donor darah?",
            "jawaban" => "Donor darah adalah proses sukarela di mana seseorang menyumbangkan sebagian darahnya untuk digunakan dalam transfusi darah kepada orang yang membutuhkan."
        ],
        [
            "pertanyaan" => "Siapakah yang bisa menjadi donor darah?",
            "jawaban" => "Orang dewasa sehat yang memenuhi syarat-syarat tertentu seperti berat badan minimal, tekanan darah dalam rentang normal, dan tidak memiliki kondisi kesehatan tertentu yang mengecualikan mereka dari donor darah."
        ],
        [
            "pertanyaan" => "Berapa sering saya dapat mendonorkan darah?",
            "jawaban" => "Pada umumnya, Anda dapat mendonorkan darah setiap 56 atau 112 hari tergantung pada regulasi di tempat Anda mendonorkan darah."
        ],
        [
            "pertanyaan" => "Apakah donor darah aman?",
            "jawaban" => "Ya, donor darah adalah proses yang aman. Perlengkapan yang digunakan untuk donor darah bersifat sekali pakai dan terjamin steril."
        ],
        [
            "pertanyaan" => "Apakah ada efek samping donor darah?",
            "jawaban" => "Beberapa orang mungkin merasa pusing atau lemah sesaat setelah donor darah, tetapi ini umumnya bersifat sementara. Dianjurkan untuk minum banyak cairan dan makan sesudah mendonorkan darah."
        ],
        [
            "pertanyaan" => "Apakah donor darah dijamin keamanannya?",
            "jawaban" => "Ya, pemeriksaan ketat dilakukan pada darah yang didonasikan untuk memastikan keamanannya sebelum digunakan untuk transfusi."
        ],
        [
            "pertanyaan" => "Bagaimana saya bisa mengetahui lokasi terdekat untuk mendonorkan darah?",
            "jawaban" => "Anda dapat mencari pusat donor darah terdekat melalui situs web atau aplikasi dari organisasi donor darah, atau menghubungi layanan informasi kesehatan setempat untuk informasi lebih lanjut."
        ],
        [
            "pertanyaan" => "Apakah donor darah memerlukan waktu yang lama?",
            "jawaban" => "Proses donor darah biasanya memakan waktu sekitar 30-60 menit, termasuk waktu pendaftaran, pemeriksaan kesehatan, donor darah itu sendiri, dan waktu istirahat setelahnya."
        ],
        [
            "pertanyaan" => "Apa yang saya butuhkan untuk persiapan sebelum mendonorkan darah?",
            "jawaban" => "Penting untuk makan makanan yang sehat dan bergizi, cukup tidur, dan minum banyak cairan sebelum mendonorkan darah. Pastikan Anda membawa identitas resmi dengan foto dan berbicara dengan staf medis jika Anda sedang mengonsumsi obat atau memiliki riwayat kesehatan tertentu."
        ],
        [
            "pertanyaan" => "Apakah donor darah memiliki manfaat bagi kesehatan saya?",
            "jawaban" => "Donor darah dapat membantu mengurangi risiko penyakit jantung dan meningkatkan produksi sel darah merah dalam tubuh."
        ]
    ];

    $i = 0;
@endphp

@extends('layout')

@section('content')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen lg:pb-0 lg:px-6">
        <div class="mx-auto max-w-screen-sm">
            <p class="mb-4 text-3xl text-center tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">FAQ</p>
            <p class="mb-4 text-lg text-center text-gray-500 dark:text-gray-400">Pertanyaan Umum tentang Donor Darah</p>

            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                @foreach ($faq as $item)
                    
                <h2 id="accordion-flush-heading-{{$i++}}">
                  <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-{{$i}}" aria-expanded="false" aria-controls="accordion-flush-body-{{$i}}">
                    <span>{{$item['pertanyaan']}}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-flush-body-{{$i}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$i}}">
                  <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{$item['jawaban']}}</p>
                  </div>
                </div>
            
                @endforeach
            </div>
        </div>   
    </div>
</section>
@endsection

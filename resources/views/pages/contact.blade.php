@php
    $nav = 'contact'
@endphp

@extends('layout')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen lg:pb-0 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <img class="mx-auto mb-8 max-w-xs" src="/upload/images/message-success.webp" alt="pesan berhasil dikirim">
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Pesan Anda telah berhasil terkirim</p>
            <p class="mb-4 text-lg  text-gray-500 dark:text-gray-400">Kami akan segera memprosesnya. Tim Layanan Pelanggan kami akan memberikan balasan melalui email <b>{{ $email }}</b> dalam waktu <b>tujuh hari</b> ke depan. Terima kasih atas kesabaran dan pengertiannya. 🙏</p>
        </div>   
    </div>
</section>

<div>
    
</div>
@endsection

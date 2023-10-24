@extends('layout')

@section('content')

<div class="-mt-2 mb-16 flex items-center">
  
  <div
    class="mr-5 shrink-0 rounded-full border-[0.5px] border-black/10 bg-white/50 p-3 shadow dark:bg-white/[15%]"
  >
    <img
      class="my-0 aspect-square w-16 rounded-full !bg-black/5 hover:animate-spin dark:!bg-black/80"
      src="https://avatars.githubusercontent.com/u/92934849?v=4"
      alt="muhamad abi saleh"
    />
  </div>
  
  
  <div>
    <h1 class="mb-2 mt-3 text-[1.6rem] font-bold">muhamad abi saleh</h1>
    <div class="break-words">
      web developer 🐱
    </div>
  </div>
  
</div>

<section class="relative my-10 first-of-type:mt-0 last-of-type:mb-0">
  
  <span
    class="mb-2 ml-px inline-block text-[0.8rem] font-medium uppercase tracking-wider text-[#ff3b2d] opacity-70"
    >Featured</span
  >
  
  <h2 class="!my-0 pb-1 font-bold !leading-none">✉ iSurat</h2>
  <time class="text-sm antialiased opacity-60"
    >Oct 12, 2023</time
  >
  <a class="absolute inset-0 text-[0]" href="https://abiisaleh.xyz/post/isurat/">✉ iSurat</a>
</section>

<section class="relative my-10 first-of-type:mt-0 last-of-type:mb-0">
  
  <h2 class="!my-0 pb-1 font-bold !leading-none">☕ Smart Cafe</h2>
  <time class="text-sm antialiased opacity-60"
    >Oct 20, 2023</time
  >
  <a class="absolute inset-0 text-[0]" href="https://abiisaleh.xyz/post/smartcafe/">☕ Smart Cafe</a>
</section>


@endsection
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>{{ config('app.name') }}</title>
  </head>

  <body>
    
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">🩸 Darahku</span>
    </a>
    <div class="flex md:order-2">
      <a href="admin" class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">Login</a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 {{ ($nav == 'home') ? 'text-white bg-rose-700 rounded md:bg-transparent md:text-rose-700 md:p-0 dark:text-white md:dark:text-rose-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-rose-700 md:p-0 dark:text-white md:dark:hover:text-rose-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}" aria-current="page">Home</a>
        </li>
        <li>
          <a href="about" class="block py-2 pl-3 pr-4 {{ ($nav == 'about') ? 'text-white bg-rose-700 rounded md:bg-transparent md:text-rose-700 md:p-0 dark:text-white md:dark:text-rose-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-rose-700 md:p-0 dark:text-white md:dark:hover:text-rose-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">About</a>
        </li>
        <li>
          <a href="stok" class="block py-2 pl-3 pr-4 {{ ($nav == 'stok') ? 'text-white bg-rose-700 rounded md:bg-transparent md:text-rose-700 md:p-0 dark:text-white md:dark:text-rose-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-rose-700 md:p-0 dark:text-white md:dark:hover:text-rose-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Stok Darah</a>
        </li>
        <li>
          <a href="donor" class="block py-2 pl-3 pr-4 {{ ($nav == 'donor') ? 'text-white bg-rose-700 rounded md:bg-transparent md:text-rose-700 md:p-0 dark:text-white md:dark:text-rose-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-rose-700 md:p-0 dark:text-white md:dark:hover:text-rose-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Info Donor</a>
        </li>
        <li>
          <a href="/#contact" class="block py-2 pl-3 pr-4 {{ ($nav == 'contact') ? 'text-white bg-rose-700 rounded md:bg-transparent md:text-rose-700 md:p-0 dark:text-white md:dark:text-rose-500' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-rose-700 md:p-0 dark:text-white md:dark:hover:text-rose-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    @yield('content')

    
<footer class="bg-white dark:bg-gray-900">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">

    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://abiisaleh.xyz/" class="hover:underline">abiisaleh</a>. All Rights Reserved.
        </span>
    </div>
  </div>
</footer>

  </body>
</html>

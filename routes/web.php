<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('donor', [HomeController::class, 'donor']);

Route::get('about', function () {
    return view('pages.about');
});

Route::get('pesan-terkirim', function (Request $request) {
    return view('pages.contact', $request);
})->name('contact');

Route::post('pesan', [HomeController::class, 'send']);

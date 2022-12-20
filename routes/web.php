<?php

use App\Http\Controllers\poinMahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('poinMahasiswa', poinMahasiswaController::class);


Route::get('/', function () {
    return view('frontPage.dashboard');
});

Route::get('/poinPorto', function () {
    return view('frontPage.listPoint');
});

Route::get('/poinPorto', function () {
    return view('frontPage.listPoint');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    return view('frontPage.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('frontPage.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

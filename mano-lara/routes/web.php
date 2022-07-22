<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [FrontController::class, 'index'])->name('front-index');
Route::post('/front/add', [OrderController::class, 'add'])->name('orders-add');


Route::get('/colors', [ColorController::class, 'index'])->name('colors-index')->middleware('roleP:user');
Route::get('/colors/create', [ColorController::class, 'create'])->name('colors-create')->middleware('roleP:user');
Route::post('/colors/store', [ColorController::class, 'store'])->name('colors-store')->middleware('roleP:user');
Route::delete('/colors/delete/{color}', [ColorController::class, 'destroy'])->name('colors-delete')->middleware('roleP:user');

Route::get('/animals', [AnimalController::class, 'index'])->name('animals-index')->middleware('roleP:user');
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals-create')->middleware('roleP:admin');
Route::post('/animals/store', [AnimalController::class, 'store'])->name('animals-store')->middleware('roleP:admin');
Route::get('/animals/edit/{animal}', [AnimalController::class, 'edit'])->name('animals-edit')->middleware('roleP:admin');
Route::put('/animals/update/{animal}', [AnimalController::class, 'update'])->name('animals-update')->middleware('roleP:admin');
Route::delete('/animals/delete/{animal}', [AnimalController::class, 'destroy'])->name('animals-delete')->middleware('roleP:admin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

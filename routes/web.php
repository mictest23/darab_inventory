<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToastrController;
use App\Http\Controllers\UpdateController;

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

Route::get('/test', [AdminController::class, 'password']);


Route::middleware(['guest:web'])->group(function(){
    Route::view('/login', 'back.pages.login')->name('login');
    Route::view('/', 'back.pages.login')->name('login');
});

Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/more/{record}', [AdminController::class, 'more'])->name('more');

    Route::get('/add', [AddController::class, 'render'])->name('add');
    Route::post('file', [AddController::class, 'store']);

    Route::view('/add-user', 'back.pages.add-user')->name('add-user');
    Route::view('/profile', 'back.pages.profile')->name('profile');
    Route::view('/view', 'back.pages.view')->name('view');

    // new update code
    Route::get('/update/{record}', [UpdateController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [UpdateController::class, 'delete'])->name('delete');

    Route::view('/cabinet_add', 'back.pages.cabinet_add')->name('cabinet_add');
    Route::get('/cabinet_specific/{cab_specific}', [AdminController::class, 'cab_spec'])->name('cabinet_specific');
    Route::view('/cabinet', 'back.pages.cabinet')->name('cabinet');
    Route::view('/model', 'back.pages.model')->name('model');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
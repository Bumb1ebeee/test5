<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/register', [UserController::class, 'registerPage'])->name('registerPage')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/store', [MessageController::class, 'store'])->name('storeMessage')->middleware('auth');
Route::get('/', [MessageController::class, 'index'])->name('index');
Route::post('/insult', [MessageController::class, 'insult'])->name('insult');
Route::post('/notInsult', [MessageController::class, 'notInsult'])->name('notInsult');
Route::post('/delete', [MessageController::class, 'delete'])->name('delete');

Route::post('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/admin', [UserController::class, 'admin'])->name('adminPage')->middleware('admin');

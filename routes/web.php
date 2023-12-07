<?php

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

Route::get('/index', [App\Http\Controllers\Render::class, 'displayPhotos'])->name('index');
Route::get('/', [App\Http\Controllers\Render::class, 'displayPhotos'])->name('index');

Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginT'])->name('loginT');

Route::get('/user', [App\Http\Controllers\UserController::class, 'displayUser'])->name('user');

Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'registerT'])->name('registerT');

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/photo/{id}', [App\Http\Controllers\Render::class, 'displayPhoto'])->name('photo');
Route::get('/user/{id}', [App\Http\Controllers\Render::class, 'displayUser'])->name('user');

Route::get('/NewPhoto', [App\Http\Controllers\Render::class, 'NewPhoto'])->name('NewPhoto');
Route::post('/NewPhoto', [App\Http\Controllers\Render::class, 'NewPhotoT'])->name('NewPhotoT');

Route::get('/explorer', [App\Http\Controllers\Render::class, 'explorer'])->name('explorer');
Route::post('/explorer', [App\Http\Controllers\Render::class, 'explorerT'])->name('explorerT');

Route::get('/', [App\Http\Controllers\UserController::class, 'AddAlbum'])->name('addAlbums');

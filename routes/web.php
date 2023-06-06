<?php

use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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


Route::get('/login', [LoginController::class, 'getPage']);
Route::get('/register', [RegisterController::class, 'getPage']);
Route::get('/', [HomeController::class, 'getPage']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/upload', [HomeController::class, 'uploadiamge'])->name('ckeditor.upload');
Route::post('/post', [HomeController::class, 'post']);

Route::get('/dictionary', [DictionaryController::class, 'getPage']);
Route::post('/user_dictionary', [DictionaryController::class, 'insert']);

Route::get('/dictionary/view/{item}', [DictionaryController::class, 'view_item']);
Route::delete('/dictionary/delete/{item}', [DictionaryController::class, 'delete']);
Route::get('/dictionary/edit/{item}', [DictionaryController::class, 'edit']);
Route::put('/dictionary/edit/{item}', [DictionaryController::class, 'update']);
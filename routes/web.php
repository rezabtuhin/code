<?php

use App\Http\Controllers\ContributionController;
use App\Http\Controllers\ContributionEditController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserviewController;
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

Route::get('/create-problems', [ProblemController::class, 'getPage']);
Route::post('/create-problems', [ProblemController::class, 'createNew']);


Route::get('/contribution', [ContributionController::class, 'getPage']);
Route::put('/contribution/publish/{item}', [ContributionController::class, 'publish']);
Route::put('/contribution/hide/{item}', [ContributionController::class, 'hide']);

Route::get('/contribution/userview/{item}', [UserviewController::class, 'getPage']);
Route::delete('/contribution/delete/{item}', [UserviewController::class, 'delete']);
Route::get('/contribution/edit/{item}', [ContributionEditController::class, 'getPage']);
Route::put('/contribution/edit/{item}', [ContributionEditController::class, 'update']);
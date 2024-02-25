<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;

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
Route::middleware('auth')->group(function () {

    Route::get('/', [myController::class, 'index']);

    Route::get('/cookstory', [myController::class, 'cookstory']);
    
    Route::post('/cookstory', [myController::class, 'serve']);
    
    Route::get('/mystories', [myController::class, 'mystories']);
    
    Route::get('/favorites', [myController::class, 'favorites']);
    
    Route::get('/togglefavorites/{storyId}', [myController::class, 'togglefavorites']);
    
    Route::get('/read/{storyId}', [myController::class, 'read']);
    
    Route::get('/edit/{storyId}', [myController::class, 'edit']);
    
    Route::get('/logout', [myController::class, 'logout']);
    
    Route::post('/delete', [myController::class, 'delete']);
    
    Route::post('/editstory', [myController::class, 'editstory']);
    
    Route::get('/rate/{val}', [myController::class, 'rate']);
    
    Route::post('/search', [myController::class, 'search']);
    
    Route::get('/sort', [myController::class, 'sort']);
    
});


Route::get('/home', [myController::class, 'home'])->name("home");

Route::post('/login', [myController::class, 'login']);

Route::post('/signup', [myController::class, 'signup']);

Route::get('/login', [myController::class, 'tologin']);

Route::get('/signup', [myController::class, 'tosignup']);





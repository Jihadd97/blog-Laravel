<?php

use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteUri;
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

/*
//Brainstorming For Starting A New Project
//1- Define a new route so the user can access it through browser.
//2- Define a controller that renders a view.
//3- Define a view that contains list of posts.
//4- Remove any static HTML data from the view.
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create' , [PostController::class, 'create'])->name('posts.create');
Route::post('posts' , [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit' , [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}' , [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
 
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardMovieController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/movie', [MovieController::class, 'professional']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('movies', MovieController::class);
Route::resource('casts', CastController::class);
Route::resource('movies.comments', CommentController::class)->shallow();
Route::get('/movie/show/{id}', [MovieController::class, 'show2']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');
Route::post('/dashboard/movie/create', [DashboardMovieController::class, 'store']);
Route::get('/dashboard/movie/checkSlug', [DashboardMovieController::class, 'checkSlug'])
->middleware('auth');
Route::resource('/dashboard/movie', DashboardMovieController::class)->middleware('auth');
Route::get('/dashboard/movie/show/{id}', [DashboardMovieController::class, 'show']);
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

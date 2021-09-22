<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Blog\AuthorController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostResourceController;
use App\Http\Controllers\Dashboard\UserResourceController;
use App\Http\Controllers\Dashboard\CategoryResourceController;
use App\Http\Controllers\Dashboard\ThumbnailResourceController;

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

Route::view('/test', 'test');

Route::permanentRedirect('/home', '/');

Route::get('/', [HomeController::class, 'index']);

Route::post('/newsletter', NewsletterController::class);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->where(['post:slug' => '[A-Za-z0-9\-]+']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);


//? Routes for GUEST users
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->middleware('throttle:consecutive-failed-login');

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});


//? Routes for AUTHENTICATED users
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store']);

    Route::post('/logout', [LoginController::class, 'logout']);

    //? Routes for ADMINISTRATOR
    Route::group(['prefix' => '/dashboard', 'middleware' => 'can:access_dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/posts/checkSlug', [PostResourceController::class, 'checkSlug']);
        Route::get('/posts/all', [PostResourceController::class, 'all'])->name('postResource.all');
        Route::resource('/posts', PostResourceController::class);

        Route::resource('/categories', CategoryResourceController::class)->except('show');
        
        Route::resource('/thumbnails', ThumbnailResourceController::class);

        Route::resource('/users', UserResourceController::class)->except('create', 'store')->middleware('can:superuser');

        Route::get('/settings', [DashboardController::class, 'settings']);
    });
});

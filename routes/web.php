<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Dashboard\PostResourceController;
use App\Http\Controllers\Dashboard\UserResourceController;
use App\Http\Controllers\Dashboard\CategoryResourceController;

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

Route::get('/', function () {
    return view('home.index', [
      'title' => 'Home',
      'active' => 'home',
    ]);
});

Route::post('/newsletter', NewsletterController::class);

Route::get('/about', function () {
    return view('home.about', [
      'title' => 'About',
      'active' => 'about',
      'name' => 'Wendy Surya Wijaya',
      'age' => 21,
      'gender' => 'Male',
      'image' => 'me.jpg'
    ]);
})->middleware('throttle:my-limiter');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->where(['post:slug' => '[A-Za-z0-9\-]+']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);


//? Routes for GUEST users
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->middleware('throttle:three-failed-login');

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});


//? Routes for AUTHENTICATED users
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store']);

    Route::post('/logout', [LoginController::class, 'logout']);

    //? Routes for ADMINISTRATOR
    Route::group(['prefix' => '/dashboard', 'middleware' => 'can:access_dashboard'], function () {
        Route::get('/', function () {
            return view('dashboard/index', [
                'title' => 'Dashboard',
                'active' => 'dashboard'
            ]);
        });

        Route::get('/posts/checkSlug', [PostResourceController::class, 'checkSlug']);
        Route::get('/posts/all', [PostResourceController::class, 'all'])->name('postResource.all');
        Route::resource('/posts', PostResourceController::class);

        Route::get('/categories/checkSlug', [CategoryResourceController::class, 'checkSlug']);
        Route::resource('/categories', CategoryResourceController::class)->except('show');

        Route::resource('/users', UserResourceController::class)->except('create', 'store')->middleware('can:superuser');
    });
});

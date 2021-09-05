<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home', [
      'title' => 'Home',
      'active' => 'home',
    ]);
});

Route::post('/newsletter', NewsletterController::class);

Route::get('/about', function () {
    return view('about', [
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

Route::get('/authors', [UserController::class, 'index']);


//? Routes for GUEST users
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->middleware('throttle:three-failed-login');
    
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
});


//? Routes for AUTHENTICATED users
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    //? Prefix the route name with /dashboard
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard/index', [
                'title' => 'Dashboard',
                'active' => 'dashboard'
            ]);
        });
        
        Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
        Route::resource('/posts', DashboardPostController::class);
    });
    
    Route::post('/posts/{post:slug}/comment', [PostCommentController::class, 'store']);
});
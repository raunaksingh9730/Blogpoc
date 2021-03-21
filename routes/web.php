<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommentController;

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

// Route::get('/', function () {
    Route::get('/', [WelcomeController::class, 'index']);
// });

Auth::routes();
Route::group(['prefix'=>'admin', 'middleware' => ['auth','role:administrator']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/user',UserController::class);
    Route::resource('/category',CategoryController::class);
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});



Route::middleware(['auth','role:writer'])->group(function () {
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
});

Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post', [PostController::class, 'index'])->name('post.index');

Route::middleware('auth')->group(function () {
    Route::post('comment',[CommentController::class,'store'])->name('comment.store');
});

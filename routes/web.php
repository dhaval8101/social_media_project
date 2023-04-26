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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostlikeController;
use App\Models\Postcomment;

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('update/{id}', [RegisterController::class, 'edit']);
Route::get('/show', [RegisterController::class, 'show']);
Route::post('update', [RegisterController::class, 'update'])->name('profile.update');
Route::view('update', 'update');
Route::post('/posts/create', [PostController::class, 'store'])->name('create');
Route::get('/pages', [PostController::class, 'show']);
Route::get('/userpost',  [PostController::class, 'userPost'])->name('userpost');
Route::get('/user-management',  [PostController::class, 'show']);
Route::view('posts/create', 'posts/create');
Route::view('/postupdate', 'postupdate');
Route::post('/upload-image', [PostController::class, 'upload']);
Route::view('/test', '/test');
Route::get('delete/{id}', [RegisterController::class, 'delete']);
Route::get('delete/{id}', [PostController::class, 'delete']);
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
Route::view('/postlike', '/postlike');
Route::get('/like/{post}', [PostlikeController::class, 'like'])->name('postlike.like');
Route::get('/dislike/{post}', [PostlikeController::class, 'dislike'])->name('postlike.dislike');
Route::view('pages/userpost', 'pages/userpost');
Route::get('/posts/{postId}/likes', [PostlikeController::class, 'showPostLikes'])->name('postLikes.show');
Route::get('/posts/{post}', [PostlikeController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}', [PostlikeController::class, 'show']);
Route::view('/postLikes', '/postLikes');
    Route::post('/comment/{post}', [PostCommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{post}', [PostCommentController::class, 'comment'])->name('comment.view');







Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
    Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
    Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
    Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
    Route::get('/{page}', [PageController::class, 'index'])->name('page');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
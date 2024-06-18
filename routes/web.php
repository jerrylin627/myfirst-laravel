<?php
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TestsController;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });


Route::get('/', function () {
   
    return view('index');
})->name('index');

Route::get('hello', function () {
    return ('Hello World!');
});

Route::get('foo/{name?}/foo2/{sex?}', [TestsController::class, 'index']);

Route::get('test2', function () {
    return redirect('index') ;
});

Auth::routes();

//posts
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostsController::class, 'store'])->name('posts.store');
Route::get('posts/{id}/show', [PostsController::class, 'show'])->name('posts.show');
Route::get('posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::patch('posts/{id}', [PostsController::class, 'update'])->name('posts.update');
Route::delete('posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

// Route::get('login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [Auth\LoginController::class, 'login']);
// Route::post('logout', [Auth\LoginController::class, 'logout'])->name('logout');
// // 註冊相關
// Route::get('register', [Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [Auth\RegisterController::class, 'register']);
// // 重設密碼相關
// Route::get('password/reset', [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [Auth\ResetPasswordController::class, 'reset']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

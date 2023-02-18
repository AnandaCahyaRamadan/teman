<?php

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserKonsultasiController;
use App\Http\Controllers\UserLogbookController;
use App\Http\Controllers\UserPendaftaranController;
use App\Http\Controllers\UserPostController;

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
    return view('welcome');
});

Auth::routes([
    'verify' => true
]);
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// route::get('/admin/dashboard', function(){
//     return view('admin.index');
// })->middleware('auth');

route::resource('/admin/dashboard', AdminDashboardController::class)->middleware('auth');

Route::resource('admin/users', UserAdminController::class)
    ->middleware('auth');
Route::get('user/search', [App\Http\Controllers\UserAdminController::class, 'search'])->name('user/search')->middleware('verified');

//comment 
Route::resource('/admin/comment', CommentController::class)->middleware('auth','verified');
Route::get('comment/search', [App\Http\Controllers\CommentController::class, 'search'])->name('comment/search')->middleware('verified');

route::get('pendaftaran', [UserPendaftaranController::class, 'index'])->middleware('verified');
route::get('pendaftaran/create', [UserPendaftaranController::class, 'create'])->middleware('verified');
route::post('pendaftaran/store', [UserPendaftaranController::class, 'store'])->middleware('verified');

Route::resource('admin/pendaftaran', PendaftaranController::class)
->middleware('auth','verified');
Route::get('pendaftaran/search', [App\Http\Controllers\PendaftaranController::class, 'search'])->name('pendaftaran/search')->middleware('verified');

route::post('logbook/store', [UserLogbookController::class, 'store'])->middleware('verified');
route::get('logbook', [\App\Http\Controllers\UserLogbookController::class, 'create'])->middleware('verified');

Route::resource('admin/logbook', LogbookController::class)
->middleware('auth','verified');
Route::get('logbook/search', [App\Http\Controllers\LogbookController::class, 'search'])->name('logbook/search')->middleware('verified');

Route::get('/klinikwirausaha/posts',[UserPostController::class, 'index'] );

//single post
Route::get ('/klinikwirausaha/posts/{post:slug}', [UserPostController::class, 'show']);
Route::post ('/klinikwirausaha/posts/{post:slug}', [UserPostController::class, 'postkomentar']);

Route::get('/posts/search', [App\Http\Controllers\PostController::class, 'search'])->name('posts/search')->middleware('verified');
route::get('/admin/posts/checkSlug', [PostController::class,'checkSlug'])->middleware('auth');
route::resource('/admin/posts',PostController::class)->middleware('auth','verified');


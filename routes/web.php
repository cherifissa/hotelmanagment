<?php

use App\Models\Commentaire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginaction');
Route::post('/disconnect', [LoginController::class, 'disconnect'])->name('disconnect');

//route client
Route::prefix('/')->group(function () {
    Route::resource('/message', MessageController::class)->only('store');
    Route::resource('commentaires', Commentaire::class)->only('index', 'destroy', 'create', 'store');
    Route::get('/contact', function () {
        return view('contact.contact');
    });
    Route::get('/about', function () {
        return view('about.about');
    });
    Route::get('/gallery', function () {
        return view('gallery.gallery');
    });
    Route::get('/chambre', function () {
        return view('chambre.chambre');
    });
    Route::get('/blog', function () {
        return view('blog.blog');
    });
});

//route admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('manager.index');
    });
    Route::resource('chambres', ChambreController::class)->except('show');
    Route::resource('/messages', MessageController::class)->only('index', 'destroy');
    Route::resource('profile', ProfileController::class)->only('update', 'index');
    Route::post('changePassword/{gerantid}', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::resource('users', Usercontroller::class)->except('show');
    Route::resource('admins', AdminController::class)->only('index');
    Route::resource('clients', ClientController::class)->only('index');
    Route::resource('reservations', ReservationController::class)->except('show');
})->name('adminindex');
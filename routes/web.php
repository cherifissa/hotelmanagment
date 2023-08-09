<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\DemandeReservationController;
use App\Http\Controllers\FactureController;

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
//route commun
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginaction');
Route::post('/disconnect', [LoginController::class, 'disconnect'])->name('disconnect');

//route client
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('accueil.index');
    })->name('accueil');
    Route::resource('/message', MessageController::class)->only('store');
    Route::resource('commentaires', CommentaireController::class)->only('index', 'destroy', 'create', 'store');
    Route::resource('demande_reservations', DemandeReservationController::class)->only('create', 'store');
    Route::get('/dasboard', [ClientDashboardController::class, 'index'])->name('dashboard');

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
    Route::get('facture', [FactureController::class, 'index'])->name('facture');
    Route::resource('demandes', DemandeReservationController::class)->except('show');
    Route::resource('chambres', ChambreController::class)->except('show');
    Route::resource('/messages', MessageController::class)->only('index', 'destroy');
    Route::resource('profile', ProfileController::class)->only('update', 'index');
    Route::post('changePassword/{gerantid}', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::resource('users', Usercontroller::class)->except('show');
    Route::resource('admins', AdminController::class)->only('index');
    Route::resource('clients', ClientController::class)->only('index');
    Route::resource('reservations', ReservationController::class)->except('show');
})->name('adminindex');

Route::prefix('restaurant')->group(function () {
    Route::get('/', function () {
        return view('manager.restaurants.index');
    });
    Route::get('reservations', [ReservationController::class, 'indexrsv'])->name('rsvindex');
    Route::get('clients', [ClientController::class, 'indexclt'])->name('cltindex');
    Route::resource('services', ServiceController::class)->except('show');
})->name('restoindex');

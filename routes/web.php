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
use App\Http\Controllers\StatistiqueController;
use App\Http\Middleware\AdminAccessMiddleware;
use App\Http\Middleware\ReceptAccessMiddleware;
use App\Http\Middleware\RestaurantAccessMiddleware;
use FontLib\Table\Type\name;
use PhpParser\Builder\Function_;

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
Route::post('/disconnect/{userid}', [LoginController::class, 'disconnect'])->name('disconnect');

//route client
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('accueil.index');
    })->name('accueil');
    Route::resource('/message', MessageController::class)->only('store');
    Route::post('commentaire', [CommentaireController::class, 'store'])->name('commentairesend');
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
    })->name('chambre');
    Route::get('/blog', function () {
        return view('blog.blog');
    });
});
$adminAndReceptRoutes = function () {
    Route::get('/', function () {
        return view('manager.index');
    })->name('manageindex');
    Route::get('facture/{reservation}', [FactureController::class, 'index'])->name('facture');
    Route::resource('demandes', DemandeReservationController::class)->except('show');
    Route::get('chambres', [ChambreController::class, 'index'])->name('chambrerecept');
    Route::resource('/messages', MessageController::class)->only('index', 'destroy');
    Route::resource('profile', ProfileController::class)->only('update', 'index');
    Route::post('changePassword/{id}', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::resource('clients', ClientController::class)->only('index');
    Route::resource('users', Usercontroller::class)->except('show');
    Route::resource('commentaires', CommentaireController::class)->only('index', 'destroy');
    Route::resource('reservations', ReservationController::class)->except('show');
};

$adminRoutes = function () {
    Route::resource('admins', AdminController::class)->only('index');
    Route::get('statistiques', [StatistiqueController::class, 'index'])->name('statistiques');
    Route::resource('chambres', ChambreController::class)->except('show');
};

//route admin
Route::prefix('admin')->middleware([AdminAccessMiddleware::class])->group($adminAndReceptRoutes, $adminRoutes);
Route::prefix('admin')->middleware([AdminAccessMiddleware::class])->group($adminRoutes);

//route recept
Route::prefix('recept')->middleware([ReceptAccessMiddleware::class])->group($adminAndReceptRoutes);



//restaurantr
//middleware([RestaurantAccessMiddleware::class])->
Route::prefix('restaurant')->middleware([RestaurantAccessMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('manager.restaurants.index');
    });
    Route::get('reservations', [ReservationController::class, 'indexrsv'])->name('rsvindex');
    Route::get('clients', [ClientController::class, 'indexclt'])->name('cltindex');
    Route::resource('services', ServiceController::class)->except('show');
})->name('restoindex');

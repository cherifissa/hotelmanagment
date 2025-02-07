<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backends\Usercontroller;
use App\Http\Controllers\backends\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\backends\ClientController;
use App\Http\Controllers\backends\ChambreController;
use App\Http\Controllers\backends\FactureController;
use App\Http\Controllers\backends\MessageController;
use App\Http\Controllers\backends\ProfileController;
use App\Http\Controllers\backends\ServiceController;
use App\Http\Middleware\AdminAccessMiddleware;
use App\Http\Controllers\backends\CommentaireController;
use App\Http\Controllers\backends\ReservationController;
use App\Http\Middleware\ReceptAccessMiddleware;
use App\Http\Controllers\backends\ClientDashboardController;
use App\Http\Middleware\RestaurantAccessMiddleware;
use App\Http\Controllers\backends\ChambreCategorieController;
use App\Http\Controllers\backends\StatistiqueController;
use App\Http\Controllers\ProduitController;

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
    Route::get('/chambre/{chambre}', [ChambreCategorieController::class, 'infos'])->name('chambreinfos');
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
    Route::get('facture', [FactureController::class, 'index'])->name('facture');
    Route::get('print_facture', [FactureController::class, 'print'])->name('facture');
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
    Route::resource('chambre_categories', ChambreCategorieController::class)->except('show');
};

//route admin
Route::prefix('admin')->middleware([AdminAccessMiddleware::class])->group($adminAndReceptRoutes);
Route::prefix('admin')->middleware([AdminAccessMiddleware::class])->group($adminRoutes);

//route recept
Route::prefix('recept')->middleware([ReceptAccessMiddleware::class])->group($adminAndReceptRoutes);

$BarRestaurantRoutes = function () {
    Route::get('reservations', [ReservationController::class, 'indexrsv'])->name('rsvindex');
    Route::get('clients', [ClientController::class, 'indexclt'])->name('cltindex');
};
$restoRoutes = function () {
    Route::get('/', [ProduitController::class, 'index']);
    Route::resource('services', ServiceController::class)->except('show');
    Route::resource('produits', ProduitController::class)->except('show');
};
$BarRoutes = function () {
    Route::get('/', function () {
        return view('manager.bars.index');
    });
};

//restaurant
Route::prefix('restaurant')->middleware([RestaurantAccessMiddleware::class])->group($BarRestaurantRoutes);
Route::prefix('restaurant')->middleware([RestaurantAccessMiddleware::class])->group($restoRoutes);
//bar
Route::prefix('bar')->group($BarRestaurantRoutes);
Route::prefix('bar')->group($BarRoutes);

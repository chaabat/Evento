<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories');
    Route::post('/categories', [CategorieController::class, 'store'])->name('addCategorie');
    Route::put('/categories', [CategorieController::class, 'update'])->name('updateCategorie');
    Route::delete('/categories/{categorie}', [CategorieController::class, 'delete'])->name('deleteCategorie');

    Route::get('/utilisateurs', [AdminController::class, 'utilisateurs'])->name('adminUtilisateur');
    Route::get('/organisateurs', [AdminController::class, 'organisateurs'])->name('adminOrganisateur');
    Route::get('/organisateurs/{id}/delete', [AdminController::class, 'deleteOrganisateur'])->name('deleteOrganisateur');
    Route::get('/organisateurs/{id}/activate', [AdminController::class, 'activeOrganisateur'])->name('activateOrganisateur');


    Route::get('/evenments', [AdminController::class, 'evenments'])->name('evenments');
    Route::patch('/evenments/{event}', [AdminController::class, 'updateStatus'])->name('updateStatus');
    Route::delete('/evenments/{evenement}', [AdminController::class, 'deleteEvent'])->name('deleteEvent');
});



//utilisateur
Route::middleware(['auth', 'role:utilisateur'])->group(function () {
    Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur');
    Route::get('/events', [ReservationController::class, 'utilisateurEvent'])->name('utilisateurEvent');

    Route::get('/eventDetails/{id}', [ReservationController::class, 'showDetails'])->name('eventDetails');
    Route::post('/reservations/{eventId}', [ReservationController::class, 'createReservation'])->name('createReservation');

    Route::get('/generate-ticket/{reservation}/{event}', [ReservationController::class, 'generateTicket'])->name('generateTicket');
});




//organisateur
Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur', [EvenementController::class, 'index'])->name('organisateur');
    Route::post('/organisateur', [EvenementController::class, 'create'])->name('addOrganisateur');
    Route::delete('/organisateur/{evenement}', [EvenementController::class, 'delete'])->name('deleteEvenement');
    Route::put('/organisateur-update', [EvenementController::class, 'updateEvent'])->name('updateEvenement');
    Route::get('/statistique', [OrganisateurController::class, 'statistique'])->name('statistique');

    Route::get('/reservation', [ReservationController::class, 'viewReservations'])->name('reservation');

    Route::patch('/update-reservation-statut/{reservationId}', [ReservationController::class, 'updateReservationStatus'])->name('updateReservationStatus');
});

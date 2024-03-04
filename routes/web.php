<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});



//utilisateur
Route::middleware(['auth', 'role:utilisateur'])->group(function () {
    Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur');
});




//organisateur
Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur', [OrganisateurController::class, 'index'])->name('organisateur');
});

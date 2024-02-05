<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

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
    // Ottieni l'utente attualmente loggato
    $logged_user = Auth::user();
    // Recupera il dottore associato all'utente loggato.
    // Restituisce un array di lunghezza 1 (relazione one-to-one)
    $doctors = Doctor::where('user_id', '=', $logged_user->id)->get();
    $doctor = $doctors[0];
    return view('welcome', compact('doctor'));
});

// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('doctors', DoctorController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('dashboard', DashboardController::class);
});

require __DIR__ . '/auth.php';

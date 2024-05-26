<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PushSubscriptionController;

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
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menus', [MenuController::class, 'index']) 
->name('menus');

Route::resource('reservations', ReservationController::class)->only(['store', 'update', 'destroy']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/menus', [MenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');
});

Route::get('/offline', function () {
    return view('offline');
});
Route::post('/subscribe', [PushSubscriptionController::class, 'subscribe']);

require __DIR__.'/auth.php';

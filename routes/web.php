<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;

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
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:0'])->name('dashboard');


//-------------------------------------*-admin routes-*---------------------------------

//--------users routes--------
Route::middleware(['auth', 'role:0'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('/users/search', [UserController::class, 'search'])->name('users.search');
});

//--------categories routes--------
Route::middleware(['auth', 'role:0'])->group(function () {
    Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::post('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
});

//-------------------------------------*-admin and user routes-*---------------------------------

Route::middleware(['auth', 'role:0,1'])->group(function () {
    //--------profile routes--------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //--------documents routes--------
    Route::resource('documents', DocumentController::class);
    Route::post('documents/search', [DocumentController::class, 'search'])->name('documents.search');
});

// Categories show route should not be inside the admin and user routes group
Route::middleware(['auth', 'role:0,1'])->group(function () {
    Route::resource('categories', CategoryController::class)->only('show');
});


require __DIR__.'/auth.php';

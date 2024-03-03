<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;

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

Route::get('/projects', [ProjectController :: class, 'index'])
    -> name('project.index');

Route::get('/projects/create', [ProjectController :: class, 'create'])
    -> name('project.create');

Route::post('/projects', [ProjectController::class, 'store'])
    ->name('project.store');

Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])
    ->name('project.edit');

Route::put('/projects/{id}', [ProjectController::class, 'update'])
    ->name('project.update');

Route::get('/types', [TypeController :: class, 'index'])
    -> name('type.index');





    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\TurmaController;

require __DIR__.'/auth.php';

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
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('alunos', AlunoController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('matriculas', MatriculaController::class);
});


// Rota para exibir a tela de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Rota para processar o login
Route::post('/login', [LoginController::class, 'login']);
// Rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

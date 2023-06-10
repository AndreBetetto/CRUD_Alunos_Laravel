<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlunoController;
use App\Http\Controllers\Admin\CursoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('/admin/alunos', [AlunoController::class, 'index'])->name('admin.alunos.index');
    Route::get('/admin/alunos/create', [AlunoController::class, 'create'])->name('admin.alunos.create');
    Route::post('/admin/alunos', [AlunoController::class, 'store'])->name('admin.alunos.store');
    Route::get('admin/alunos/update/{id}', [AlunoController::class, 'update'])->name('admin.alunos.update');
    Route::get('/admin/alunos/edit/{id}', [AlunoController::class, 'edit'])->name('admin.alunos.edit');
    Route::put('/admin/alunos/{id}', [AlunoController::class, 'destroy'])->name('admin.alunos.destroy');

    Route::get('/admin/cursos', [CursoController::class, 'index'])->name('admin.cursos.index');
    Route::get('/admin/cursos/create', [CursoController::class, 'create'])->name('admin.cursos.create');
    Route::post('/admin/cursos', [CursoController::class, 'store'])->name('admin.cursos.store');
    Route::get('admin/cursos/update/{id}', [CursoController::class, 'update'])->name('admin.cursos.update');
    Route::get('/admin/cursos/edit/{id}', [CursoController::class, 'edit'])->name('admin.cursos.edit');
    Route::put('/admin/cursos/{id}', [CursoController::class, 'destroy'])->name('admin.cursos.destroy');
   
});



Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlunoController;

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

Route::get('/admin/alunos', [AlunoController::class, 'index'])->name('admin.alunos.index');

Route::get('/admin/alunos/create', [AlunoController::class, 'create'])->name('admin.alunos.create');

Route::post('/admin/alunos/store', [AlunoController::class, 'store'])->name('admin.alunos.store');

Route::put('/admin/alunos/update/{id}', [AlunoController::class, 'update'])->name('admin.alunos.update');

Route::get('/admin/alunos/edit/{id}', [AlunoController::class, 'edit'])->name('admin.alunos.edit');

Route::get('/admin/alunos/{id}', [AlunoController::class, 'destroy'])->name('admin.alunos.destroy');




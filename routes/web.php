<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//listar
Route::get('/', [UserController::class, 'index'])->name('user.index');

//criar usuário
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');

//guardar na tabela do banco de dados
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

//visualizar
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');

//pegar da tabela
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');

//editar os dados de nome, email e senha do usuário
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');

//Deletar os dados da tabela
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

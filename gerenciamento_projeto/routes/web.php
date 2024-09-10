<?php

use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('loginStore');


Route::get('/cadastro', [\App\Http\Controllers\LoginController::class, 'viewRegister']);
Route::post('/cadastro', [\App\Http\Controllers\LoginController::class, 'register'])->name('registerStore');




Route::middleware('auth')->group(function (){
    Route::resource("projetos", ProjetoController::class);
    Route::resource("tarefas", TarefaController::class);
    Route::patch('/tarefas/{id}/toggle', [TarefaController::class, 'toggle'])->name('tarefas.toggle');
    Route::get('/tarefas/create/{projeto_id}', [TarefaController::class, 'create'])->name('tarefas.create');
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('/cadastrarProjeto', [ProjetoController::class, 'cadastrarProjeto'])->name('cadastrarProjeto');

});

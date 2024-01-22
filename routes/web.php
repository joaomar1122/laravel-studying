<?php

use App\Http\Controllers\FormaPagamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
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

Route::redirect('/', '/nota'); //MESMO SE O USUARIO NÃO DIGITAR NADA NA PRIMEIRA PAGINA ELE JA É DIRECIONADO PARA ROTA /NOTA

Route::prefix('nota')->group(function () {
    Route::get('/', [NotaController::class, 'index'])->name('nota-index');
    Route::get('/create', [NotaController::class, 'create'])->name('nota-create');
    Route::post('/', [NotaController::class, 'store'])->name('nota-store');
    Route::get('/{id_notas}/edit', [NotaController::class, 'edit'])->where('id_notas', '[0-9]+')->name('nota-edit');
    Route::put('/{id_notas}', [NotaController::class, 'update'])->where('id_notas', '[0-9]+')->name('nota-update');
    Route::delete('/{id_notas}', [NotaController::class, 'destroy'])->where('id_notas', '[0-9]+')->name('nota-destroy');
});



Route::fallback(function () {
    return "Erro Rota Não Encontrada";
});

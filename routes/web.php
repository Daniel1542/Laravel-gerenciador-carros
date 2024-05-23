<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\RevisaoController;
use App\Http\Controllers\VeiculoController;

Route::resource('proprietario', ProprietarioController::class);
Route::resource('revisao', RevisaoController::class);
Route::resource('veiculo', VeiculoController::class);

/*dashboard*/

Route::get('/', [DashboardController::class, 'dash'])->name('principal.dashboard');

/*proprietario*/

Route::get('/graficoIdade', [ProprietarioController::class, 'graficoIdade'])
    ->name('principal.graficoIdade');

Route::get('/proprietario/{id}/edit', [ProprietarioController::class, 'edit'])
    ->name('proprietario.edit');

Route::delete('/proprietario/{id}', [ProprietarioController::class, 'destroy'])
    ->name('proprietario.destroy');

Route::get('/proprietario/{id}', [ProprietarioController::class, 'show'])
    ->name('proprietario.show');

/*veiculo*/

Route::get('/veiculo/{id}/edit', [VeiculoController::class, 'edit'])
    ->name('veiculo.edit');

Route::delete('/veiculo/{id}', [VeiculoController::class, 'destroy'])
    ->name('veiculo.destroy');

Route::get('/veiculo/{id}', [VeiculoController::class, 'show'])
    ->name('veiculo.show');

/*revisao*/

Route::get('/revisao/{id}/edit', [RevisaoController::class, 'edit'])
    ->name('revisao.edit');

Route::delete('/revisao/{id}', [RevisaoController::class, 'destroy'])
    ->name('revisao.destroy');

Route::get('/revisao/{id}', [RevisaoController::class, 'show'])
    ->name('revisao.show');

Route::get('/revisoesPeriodo', [RevisaoController::class, 'revisoesPeriodo'])
    ->name('revisao.revisoesPeriodo');

Route::get('/revisoesMarcas', [RevisaoController::class, 'marcasComMaisRevisoes'])
    ->name('revisao.marcasComMaisRevisoes');

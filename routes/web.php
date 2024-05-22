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
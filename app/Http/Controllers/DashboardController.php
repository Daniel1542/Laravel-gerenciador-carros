<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;
use App\Models\Revisao;
use App\Models\Veiculo;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dash()
    {
        $totalVeiculo = Veiculo::count();
        $totalProprietario = Proprietario::count();
        $totalRevisao = Revisao::count();

        return view('principal.dashboard', compact('totalVeiculo', 'totalProprietario', 'totalRevisao'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    private function VeiculosPorGenero($veiculos)
    {
        $quantidadeHomens = 0;
        $quantidadeMulheres = 0;

        foreach ($veiculos as $veiculo) {
            if ($veiculo->proprietario->sexo == 'M') {
                $quantidadeHomens++;
            } elseif ($veiculo->proprietario->sexo == 'F') {
                $quantidadeMulheres++;
            }
        }

        // Determina quem tem mais veículos
        $maisVeiculos = $quantidadeHomens > $quantidadeMulheres ? 'Homens' : 'Mulheres';

        return [
            'quantidadeHomens' => $quantidadeHomens,
            'quantidadeMulheres' => $quantidadeMulheres,
            'maisVeiculos' => $maisVeiculos, 
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tudo = Veiculo::all();

        // veiculos e proprietario
        $veiculosNome = Veiculo::with('proprietario')->get()->sortBy(function ($veiculo) {
            return $veiculo->proprietario->nome;
        });

        // veiculos por genero
        $veiculosSexo = Veiculo::with('proprietario')->get();

        $totalSexo = $this->VeiculosPorGenero($veiculosSexo);
        
        return view('veiculo.listaVeiculo', compact('tudo', 'veiculosNome', 'totalSexo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

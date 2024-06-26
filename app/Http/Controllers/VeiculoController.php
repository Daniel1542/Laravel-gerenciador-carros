<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;
use Illuminate\Support\Facades\DB;
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

          // veiculos por ordem
        $marcas = Veiculo::select('marca', DB::raw('count(*) as total_veiculos'))
            ->groupBy('marca')
            ->orderByDesc('total_veiculos')
            ->get();

        // veiculos e proprietario
        $veiculosNome = Veiculo::with('proprietario')
            ->get()
            ->sortBy(function ($veiculo) {
                return $veiculo->proprietario->nome;
            });

        // veiculos por genero
        $veiculosSexo = Veiculo::with('proprietario')->get();

        $totalSexo = $this->VeiculosPorGenero($veiculosSexo);

        return view('veiculo.listaVeiculo', compact('tudo', 'veiculosNome', 'totalSexo', 'marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $proprietario = Proprietario::find($id);

        if (!$proprietario) {
            return redirect()->back()->with('msg', 'Proprietário não encontrado.');
        }

        return view('veiculo.createVeiculo', compact('proprietario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_proprietario' => 'exists:proprietarios,id',
            'modelo' => 'string|max:30',
            'marca' => 'string|max:30',
            'placa' => 'string|max:14|unique:veiculos',
        ]);

        Veiculo::create($request->all());

        return redirect()->route('veiculo.index')
                        ->with('success', 'Veículo criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        return view('veiculo.mostrarVeiculo', compact('veiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        return view('veiculo.editVeiculo', compact('veiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            'id_proprietario' => 'exists:proprietarios,id',
            'modelo' => 'string|max:30',
            'marca' => 'string|max:30',
            'placa' => 'string|max:14|unique:veiculos,placa' . $veiculo->id,
        ]);

        $veiculo->update($request->all());

        return redirect()->route('veiculo.index')
                        ->with('success', 'Veículo atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return redirect()->route('veiculo.index')
                        ->with('success', 'Veículo excluído com sucesso.');
    }
}

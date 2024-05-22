<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;

class ProprietarioController extends Controller
{
    private function funcoesGraficos($dado)
    {
        $dados = [];
        $labels = [];

        foreach ($dado as $sexo => $proprietarios){
            $quantMulher = $proprietarios->where('sexo', 'F')->count();
            $quantHomem = $proprietarios->where('sexo', 'M')->count();

            $somaMulher = $proprietarios->where('sexo', 'F')->sum('idade');
            $somaHomem = $proprietarios->where('sexo', 'M')->sum('idade');

            $idadeMediaMulher = $quantMulher > 0 ? $somaMulher / $quantMulher : 0;
            $idadeMediaHomem = $quantHomem > 0 ? $somaHomem / $quantHomem : 0;

            if ($quantMulher > 0) {
                $dados[] = [
                    'sexo' => $sexo,
                    'idadeMedia' => $idadeMediaMulher,
                ];
                $labels[] = $sexo;
            }

            if ($quantHomem > 0) {
                $dados[] = [
                    'sexo' => $sexo,
                    'idadeMedia' => $idadeMediaHomem,
                ];
                $labels[] = $sexo;
            }
        }

        $data = [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => array_column($dados, 'idadeMedia'),
                    'backgroundColor' => $this->gerarCoresAleatorias(count($labels)),
                ]
            ]
        ];

        return $data;
    }

    private function gerarCoresAleatorias($quantidade)
    {
        $cores = [];
        for ($i = 0; $i < $quantidade; $i++) {
            $cores[] = $this->gerarCorAleatoria();
        }
        return $cores;
    }

    private function gerarCorAleatoria()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Proprietario::all();
        
        return view('proprietario.listaProprietario', compact('total'));

    }
    public function graficoIdade()
    {

        $totalSexo = Proprietario::where('sexo',['M','F'])->get();

        $total = $this-> funcoesGraficos($totalSexo->groupBy('sexo'));
        
        return response()->json($total);
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

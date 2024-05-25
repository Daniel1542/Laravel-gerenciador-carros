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

        foreach ($dado as $sexo => $proprietarios) {
            $quantMulher = $proprietarios->where('sexo', 'F')->count();
            $quantHomem = $proprietarios->where('sexo', 'M')->count();

            $somaMulher = $proprietarios->where('sexo', 'F')->sum('idade');
            $somaHomem = $proprietarios->where('sexo', 'M')->sum('idade');

            $idadeMediaMulher = $quantMulher > 0 ? $somaMulher / $quantMulher : 0;
            $idadeMediaHomem = $quantHomem > 0 ? $somaHomem / $quantHomem : 0;

            if ($quantMulher > 0) {
                $dados[] = [
                    'sexo' => 'Mulheres',
                    'idadeMedia' => $idadeMediaMulher,
                ];
                $labels[] = 'Mulheres';
            }

            if ($quantHomem > 0) {
                $dados[] = [
                    'sexo' => 'Homens',
                    'idadeMedia' => $idadeMediaHomem,
                ];
                $labels[] = 'Homens';
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

        $totalSexo = Proprietario::whereIn('sexo', ['M','F'])->get();

        $total = $this-> funcoesGraficos($totalSexo->groupBy('sexo'));

        return response()->json($total);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proprietario.createProprietario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'string|max:40',
            'cpf' => 'min:11|max:11|unique:proprietarios',
            'idade' => 'int|max:3',
            'telefone' => 'string|max:15',
            'sexo' => 'in:M,F',
            'email' => 'max:18|email|nullable|unique:proprietarios',
        ]);

        Proprietario::create($request->all());

        return redirect()->route('proprietario.index')
                        ->with('success', 'Proprietário criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proprietario $proprietario)
    {
        return view('proprietario.mostrarProprietario', compact('proprietario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proprietario $proprietario)
    {
        return view('proprietario.editProprietario', compact('proprietario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proprietario $proprietario)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:proprietarios,cpf,' . $proprietario->id,
            'idade' => 'required|integer',
            'telefone' => 'required',
            'sexo' => 'required',
            'email' => 'nullable|email',
        ]);

        $proprietario->update($request->all());

        return redirect()->route('proprietario.index')
                        ->with('success', 'Proprietário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proprietario $proprietario)
    {

        $proprietario->delete();

        return redirect()->route('proprietario.index')
                        ->with('success', 'Proprietário excluído com sucesso.');
    }
}

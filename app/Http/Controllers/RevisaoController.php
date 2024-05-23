<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revisao;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class RevisaoController extends Controller
{
    private function consultarPessoasComMaisRevisoes()
    {
        return DB::table('proprietarios')
            ->join('veiculos', 'proprietarios.cpf', '=', 'veiculos.cpf')
            ->join('revisoes', 'veiculos.placa', '=', 'revisoes.placa')
            ->select('proprietarios.nome', 'proprietarios.cpf', 
                    DB::raw('COUNT(revisoes.id) as total_revisoes'))
            ->groupBy('proprietarios.nome', 'proprietarios.cpf')
            ->orderByDesc('total_revisoes')
            ->get();
    }

    private function calcularMediaTempoEntreRevisoes()
    {
        $resultados = DB::table('proprietarios')
            ->join('veiculos', 'proprietarios.cpf', '=', 'veiculos.cpf')
            ->join('revisoes', 'veiculos.placa', '=', 'revisoes.placa')
            ->select('proprietarios.nome', 'proprietarios.cpf', 'revisoes.data')
            ->orderBy('proprietarios.cpf')
            ->orderBy('revisoes.data')
            ->get();

        $mediaTempo = [];

        $proprietarioAnterior = null;
        $dataRevisaoAnterior = null;

        foreach ($resultados as $resultado) {
            if ($proprietarioAnterior !== $resultado->cpf) {
                $proprietarioAnterior = $resultado->cpf;
                $dataRevisaoAnterior = null;
            } else {
                if ($dataRevisaoAnterior !== null) {
                    $diferencaDias = strtotime($resultado->data) - strtotime($dataRevisaoAnterior);
                    $mediaTempo[$resultado->cpf] = isset($mediaTempo[$resultado->cpf]) ? ($mediaTempo[$resultado->cpf] + $diferencaDias) / 2 : $diferencaDias;
                }
                $dataRevisaoAnterior = $resultado->data;
            }
        }

        return $mediaTempo;
    }

    public function revisoesPeriodo(Request $request)
    {
        $inicio = $request->input('data_inicio');
        $fim = $request->input('data_fim');

        $revisoes = Revisao::with('veiculo')
                ->whereBetween('data', [$inicio, $fim])->get()
                ->map(function ($revisao) {
                    $revisao->data_formatada = Carbon::parse($revisao->data)->format('d/m/Y');
                    return $revisao;
                });

        return view('revisao.resultadoRevisao', compact('revisoes'));
    }

    public function marcasComMaisRevisoes()
    {
        $marcasMaisRevisoes = DB::table('veiculos')
                ->join('revisoes', 'veiculos.placa', '=', 'revisoes.placa')
                ->select('veiculos.marca', DB::raw('COUNT(revisoes.id) as total_revisoes'))
                ->groupBy('veiculos.marca')
                ->orderByDesc('total_revisoes')
                ->get();

        return view('revisao.marcasRevisao', compact('marcasMaisRevisoes'));
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Revisao::all();

        $pessoasComMaisRevisoes = $this->consultarPessoasComMaisRevisoes();
        $mediaTempo = $this->calcularMediaTempoEntreRevisoes();

        return view('revisao.listaRevisao', compact('total', 'pessoasComMaisRevisoes', 'mediaTempo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('revisao.createRevisao');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'exists:veiculos,placa',
            'data' => 'date',
            'descricao' => 'string',
        ]);

        Revisao::create($request->all());

        return redirect()->route('revisao.index')
                         ->with('success', 'Revisão criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Revisao $revisao)
    {
        return view('revisao.mostrarRevisao', compact('revisao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revisao $revisao)
    {
        return view('revisao.editRevisao', compact('revisao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Revisao $revisao)
    {
        $request->validate([
            'placa' => 'required|exists:veiculos,placa',
            'data' => 'required|date',
            'descricao' => 'required|string',
        ]);

        $revisao->update($request->all());

        return redirect()->route('revisao.index')
                         ->with('success', 'Revisão atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revisao $revisao)
    {
        $revisao->delete();

        return redirect()->route('revisao.index')
                         ->with('success', 'Revisão excluída com sucesso.');
    }
}

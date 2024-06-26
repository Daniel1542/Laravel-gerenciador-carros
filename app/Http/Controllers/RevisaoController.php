<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Models\Revisao;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RevisaoController extends Controller
{
    private function consultarPessoasComMaisRevisoes()
    {
        return DB::table('proprietarios')
            ->join('veiculos', 'proprietarios.id', '=', 'veiculos.id_proprietario')
            ->join('revisoes', 'veiculos.id', '=', 'revisoes.id_veiculo')
            ->select(
                'proprietarios.nome',
                'proprietarios.id',
                DB::raw('COUNT(revisoes.id) as total_revisoes')
            )
            ->groupBy('proprietarios.nome', 'proprietarios.id')
            ->orderByDesc('total_revisoes')
            ->get();
    }

    private function calcularMediaTempoEntreRevisoes()
    {
        $resultados = DB::table('proprietarios')
            ->join('veiculos', 'proprietarios.id', '=', 'veiculos.id_proprietario')
            ->join('revisoes', 'veiculos.id', '=', 'revisoes.id_veiculo')
            ->select('proprietarios.nome', 'revisoes.data')
            ->orderBy('proprietarios.nome')
            ->orderBy('revisoes.data')
            ->get();

        $proprietarioAnterior = null;
        $dataRevisaoAnterior = null;

        $mediaTempo = [];
        $contadorRevisoes = [];

        foreach ($resultados as $resultado) {
            if ($proprietarioAnterior !== $resultado->nome) {
                $proprietarioAnterior = $resultado->nome;
                $dataRevisaoAnterior = null;
            } else {
                if ($dataRevisaoAnterior !== null) {
                    $diferencaDias = (strtotime($resultado->data) - strtotime($dataRevisaoAnterior)) / (60 * 60 * 24);
                    if (isset($mediaTempo[$resultado->nome])) {
                        $mediaTempo[$resultado->nome] += $diferencaDias;
                        $contadorRevisoes[$resultado->nome] += 1;
                    } else {
                        $mediaTempo[$resultado->nome] = $diferencaDias;
                        $contadorRevisoes[$resultado->nome] = 1;
                    }
                }
                $dataRevisaoAnterior = $resultado->data;
            }
        }
        foreach ($mediaTempo as $nome => $totalDias) {
            $mediaTempo[$nome] = $totalDias / $contadorRevisoes[$nome];
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
                ->join('revisoes', 'veiculos.id', '=', 'revisoes.id_veiculo')
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
    public function create($id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return redirect()->back()->with('msg', 'Veiculo não encontrado.');
        }

        return view('revisao.createRevisao', compact('veiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_veiculo' => 'exists:veiculos,id',
            'placa' => 'string|max:14|exists:veiculos,placa',
            'data' => 'date',
            'descricao' => 'string|max:50',
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
            'id_veiculo' => 'exists:veiculos,id',
            'placa' => 'string|max:14|exists:veiculos,placa',
            'data' => 'date',
            'descricao' => 'string|max:60',
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

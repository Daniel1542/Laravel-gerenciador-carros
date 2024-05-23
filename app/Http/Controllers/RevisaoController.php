<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revisao;

class RevisaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = Revisao::all();

        return view('revisao.listaRevisao', compact('total'));
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

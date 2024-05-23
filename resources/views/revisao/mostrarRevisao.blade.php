@extends('layouts.mainDash')
@section('title', 'Mostrar Revisão')
@section('content')
{{-- Seção para mostrar Revisão --}}
<section class="secao_cria_edita_mostra_revisao">
    <div class="container" id="caixa">
        <h1 class="text-center mb-2">Revisão</h1>
        <div class="buttons mt-4">
            <form action="{{ route('revisao.create') }}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Mostrar revisão</button>
            </form>
        </div>
        <div class="form">
            <div class="form-group">
                <label for="placa">placa:</label>
                <input type="text" id="placa" name="placa" value="{{ $revisao->placa }}" required>
            </div>
            <div class="form-group"> 
                <label for="modelo">data:</label>
                <input type="date" id="data" name="data" value="{{ $revisao->data }}" required>
            </div>
            <div class="form-group"> 
                <label for="descricao">descricao:</label>
                <input type="text" id="descricao" name="descricao" value="{{ $revisao->descricao }}" required>
            </div>
        </div>
        <div class="buttons">
            <form action="{{ route('revisao.index') }}" method="GET">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Voltar</button>
            </form>
        </div>
    </div>
</section>

@endsection
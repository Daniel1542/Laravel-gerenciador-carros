@extends('layouts.mainDash')
@section('title', 'Mostrar Veiculos')
@section('content')
{{-- Seção para mostrar Veiculos --}}
<section class="secao_cria_edita_mostra_veiculo">
    <div class="container" id="caixa">
        <h1 class="text-center mb-2">veiculos</h1>
        <div class="buttons mt-4">
            <form action="{{ route('revisao.create') }}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Cadastrar revisão</button>
            </form>
        </div>
        <div class="form">
            <div class="form-group">
                <label for="placa">placa:</label>
                <input type="text" id="placa" name="placa" value="{{ $veiculo->placa }}" required>
            </div>
            <div class="form-group"> 
                <label for="modelo">modelo:</label>
                <input type="text" id="modelo" name="modelo" value="{{ $veiculo->modelo }}" required>
            </div>
            <div class="form-group"> 
                <label for="marca">marca:</label>
                <input type="text" id="marca" name="marca" value="{{ $veiculo->marca }}" required>
            </div>
        </div>
    </div>
</section>

@endsection
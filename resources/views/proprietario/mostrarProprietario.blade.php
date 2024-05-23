@extends('layouts.mainDash')
@section('title', 'Mostrar proprietarios')
@section('content')
{{-- Seção para mostrar proprietarios --}}
<section class="secao_criar_proprietario">
    <div class="container" id="caixa">
        <h1 class="text-center mb-2">Proprietários</h1>
        <div class="buttons mt-4">
            <form action="{{ route('veiculo.create') }}" method="get" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Cadastrar Veiculo</button>
            </form>
        </div>
        <div class="form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $proprietario->nome }}" readonly required>
            </div>
            <div class="form-group">
                <label for="cpf">cpf:</label>
                <input type="text" id="cpf" name="cpf" value="{{ $proprietario->cpf }}" readonly required>
            </div>
            <div class="form-group"> 
                <label for="sexo">sexo:</label>
                <input type="text" id="sexo" name="sexo" value="{{ $proprietario->sexo }}" readonly required>
            </div>
            <div class="form-group"> 
                <label for="idade">idade:</label>
                <input type="number" id="idade" name="idade" value="{{ $proprietario->idade }}" readonly required>
            </div>
            <div class="form-group">
                <label for="email">email:</label>
                <input type="email" id="email" name="email" value="{{ $proprietario->email }}" readonly required>
            </div>
            <div class="form-group">
                <label for="telefone">telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ $proprietario->telefone }}" readonly required>
            </div>
        </div>
        <div class="buttons">
            <form action="{{ route('proprietario.index') }}" method="GET">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Voltar</button>
            </form>
        </div>
    </div>
</section>

@endsection
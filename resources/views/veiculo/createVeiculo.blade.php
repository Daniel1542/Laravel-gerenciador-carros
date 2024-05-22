@extends('layouts.mainDash')
@section('title', 'Cadastro')
@section('content')

<section class="secao_criar_proprietario">
    <div class="container" id="caixa">
        <h1 class="mb-2 text-center">Cadastrar</h1>
        <form action="{{ route('proprietario.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" oninput="this.value = this.value.toUpperCase()" value="{{ $proprietario->nome }}" required>
            </div>
            <div class="form-group">
            <label for="cpf">cpf:</label>
            <input type="date" id="cpf" name="cpf" value="{{ $proprietario->cpf }}" required>
            </div>
            <div class="form-group"> 
            <label for="corretagem">Corretagem:</label>
            <input type="number" id="corretagem" name="corretagem" value="{{ $proprietario->nome }}" required>
            </div>
            <div class="form-group"> 
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="{{ $proprietario->nome }}" required>
            </div>
            <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" id="valor" name="valor" value="{{ $proprietario->nome }}" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>  
        </form>
    </div>
</section>
  
@endsection
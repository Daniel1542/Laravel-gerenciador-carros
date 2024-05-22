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
                <input type="text" id="nome" name="nome" o  ninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="cpf">cpf:</label>
                <input type="number" id="cpf" name="cpf" required>
            </div>
            <div class="form-group"> 
                <label for="sexo">sexo:</label>
                <input type="text" id="sexo" name="sexo" required>
            </div>
            <div class="form-group"> 
                <label for="idade">idade:</label>
                <input type="number" id="idade" name="idade" required>
            </div>
            <div class="form-group">
                <label for="email">email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">telefone:</label>
                <input type="number" id="telefone" name="telefone" required>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>  
        </form>
    </div>
</section>
  
@endsection
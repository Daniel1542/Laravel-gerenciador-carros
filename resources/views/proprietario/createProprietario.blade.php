@extends('layouts.mainDash')
@section('title', 'Cadastro de proprietario')
@section('content')

<section class="secao_criar_proprietario">
    <div class="container" id="caixa">
        <h1 class="mb-2 text-center">Cadastrar proprietario</h1>
        <div class="form">
            <form action="{{ route('proprietario.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="cpf">cpf:</label>
                    <input type="number" id="cpf" name="cpf" required>
                </div>
                <div class="form-group"> 
                    <label for="sexo">sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="form-group"> 
                    <label for="idade">idade:</label>
                    <input type="number" id="idade" name="idade" required>
                </div>
                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefone">telefone:</label>
                    <input type="text" id="telefone" name="telefone" required>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-custom">Cadastrar</button>
                </div>  
            </form>
        </div>
    </div>
</section>
  
@endsection
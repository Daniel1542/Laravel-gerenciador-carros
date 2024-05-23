@extends('layouts.mainDash')
@section('title', 'Editar')
@section('content')

<section class="secao_criar_proprietario">
    <div class="container" id="caixa">
      <h1 class="mt-1 mb-2 text-center">Editar</h1>
      <div class="form">
        <form action="{{ route('proprietario.update', $proprietario->id) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          @method('PUT')
          <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" id="nome" name="nome" value="{{ $proprietario->nome }}" required>
          </div>
          <div class="form-group">
              <label for="cpf">cpf:</label>
              <input type="text" id="cpf" name="cpf" value="{{ $proprietario->cpf }}" required>
          </div>
          <div class="form-group"> 
              <label for="sexo">sexo:</label>
              <input type="text" id="sexo" name="sexo" value="{{ $proprietario->sexo }}" required>
          </div>
          <div class="form-group"> 
              <label for="idade">idade:</label>
              <input type="number" id="idade" name="idade" value="{{ $proprietario->idade }}" required>
          </div>
          <div class="form-group">
              <label for="email">email:</label>
              <input type="email" id="email" name="email" value="{{ $proprietario->email }}" required>
          </div>
          <div class="form-group">
              <label for="telefone">telefone:</label>
              <input type="text" id="telefone" name="telefone" value="{{ $proprietario->telefone }}" required>
          </div>
          <div class="form-group mt-4">
              <button type="submit" class="btn btn-primary">Editar</button>
          </div>  
        </form>
      </div>
    </div>
</section>
  
@endsection
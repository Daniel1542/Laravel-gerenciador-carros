@extends('layouts.mainDash')
@section('title','Editar')
@section('content')

<section class='secao_cria_edita_mostra_veiculo'>
  <div class="container" id="caixa">
    <h1 class="mt-1 mb-2 text-center">Editar</h1>
    <div class="form">
      <form action="{{ route('veiculo.update', $veiculo->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group"> 
            <label for="modelo">modelo:</label>
            <input type="text" id="modelo" name="modelo"value="{{ $veiculo->modelo }}" required>
        </div>
        <div class="form-group"> 
            <label for="marca">marca:</label>
            <input type="text" id="marca" name="marca"value="{{ $veiculo->marca }}" required>
        </div>
        <div class="form-group">
            <label for="placa">placa:</label>
            <input type="text" id="placa" name="placa"value="{{ $veiculo->placa }}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>  
        <div class="buttons mt-3">
          <form action="{{ route('veiculo.index') }}" method="GET">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Voltar</button>
          </form>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
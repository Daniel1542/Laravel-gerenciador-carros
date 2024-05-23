@extends('layouts.mainDash')
@section('title','Editar')
@section('content')
{{-- Seção para editar Revisão --}}
<section class='secao_cria_edita_mostra_revisao'>
  <div class="container" id="caixa">
    <h1 class="mt-1 mb-2 text-center">Editar</h1>
    <div class="form">
      <form action="{{ route('revisao.update', $revisao->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">
          <label for="placa">placa:</label>
          <input type="text" id="placa" name="placa" value="{{ $revisao->placa }}" required>
        </div>
        <div class="form-group">
            <label for="data">data:</label>
            <input type="date" id="data" name="data" value="{{ $revisao->data }}" required>
        </div>
        <div class="form-group"> 
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" value="{{ $revisao->descricao }}" required></textarea>
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>  
      </form>
  </div>
</section>

@endsection
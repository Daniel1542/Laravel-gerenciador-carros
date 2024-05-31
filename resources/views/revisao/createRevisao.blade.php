@extends('layouts.mainDash')
@section('title', 'Cadastro de revisão')
@section('content')

<section class="secao_cria_edita_mostra_revisao">
    <div class="container" id="caixa">
        <h1 class="mb-2 text-center">Cadastrar revisão</h1>
        <div class="form">
            <form action="{{ route('revisao.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id_veiculo" value="{{ $veiculo->id }}">
                <div class="form-group">
                    <label for="placa">placa:</label>
                    <input type="text" id="placa" name="placa" value="{{ $veiculo->placa }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="data">data:</label>
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="form-group"> 
                    <label for="descricao">Descrição:</label>
                    <textarea class="text-center" id="descricao" name="descricao" required></textarea>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-custom">Cadastrar</button>
                </div>  
            </form>
        </div>
    </div>
</section>
  
@endsection
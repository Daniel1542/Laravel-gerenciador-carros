@extends('layouts.mainDash')
@section('title', 'Cadastro')
@section('content')

<section class="secao_cria_edita_mostra_revisao">
    <div class="container" id="caixa">
        <h1 class="mb-2 text-center">Cadastrar</h1>
        <div class="form">
            <form action="{{ route('revisao.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="placa">Nome:</label>
                    <input type="text" id="placa" name="placa" required>
                </div>
                <div class="form-group">
                    <label for="data">data:</label>
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="form-group"> 
                    <label for="revisao">revisão:</label>
                    <input type="text" id="revisao" name="revisao" required>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-custom">Cadastrar</button>
                </div>  
            </form>
        </div>
    </div>
</section>
  
@endsection
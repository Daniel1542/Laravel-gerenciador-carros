@extends('layouts.mainDash')
@section('title', 'Cadastro Veiculo')
@section('content')

<section class="secao_criar_proprietario">
    <div class="container" id="caixa">
        <h1 class="mb-2 text-center">Cadastrar Veiculo</h1>
        <div class="form">
            <form action="{{ route('veiculo.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nome">nome:</label>
                    <input type="text" id="nome" name="nome" value="{{ $proprietario->nome }}" required>
                </div>
                <div class="form-group"> 
                    <label for="modelo">modelo:</label>
                    <input type="text" id="modelo" name="modelo" required>
                </div>
                <div class="form-group"> 
                    <label for="marca">marca:</label>
                    <input type="text" id="marca" name="marca" required>
                </div>
                <div class="form-group">
                    <label for="placa">placa:</label>
                    <input type="text" id="placa" name="placa" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>  
            </form>
        </div>
    </div>
</section>
  
@endsection
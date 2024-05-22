@extends('layouts.mainDash')
@section('title', 'Lista de proprietario')
@section('content')
{{-- Seção para mostrar proprietarios --}}
<section class="secao_proprietario">
    <div class="container" id="caixa">
        <h1 class="text-center mb-4">Proprietários</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Cpf:</th>
                        <th>Sexo:</th>     
                        <th>Idade:</th>   
                        <th>Email:</th>
                        <th>Telefone:</th>                 
                    </tr>
                </thead>
                <tbody>
                    {{-- tabela mostrando proprietarios --}}
                    @foreach($total as $dono)  
                        <tr>
                            <td> {{ $dono['nome'] }}</td>
                            <td> {{ $dono['cpf'] }}</td> 
                            <td> {{ $dono['sexo'] }}</td>
                            <td> {{ $dono['idade'] }}</td>
                            <td> {{ $dono['email'] }}</td>
                            <td> {{ $dono['telefone'] }} </td>     
                        </tr> 
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="secao_proprietario">
    <div class="container" id="caixa_2">
        <h1 class="text-center">Proprietarios</h1>
        <div class="container">
            <div class="text-center">
                <h2>Idade media</h2>
                <canvas id="graficoPizza"></canvas> 
            </div>  
            <div class="text-center">
                <h2>Sexo</h2>
                <canvas id="graficoPizza2"></canvas> 
            </div>          
        </div>
    </div>
</section>

<script src="js/proprietario_grafico.js"></script>

@endsection
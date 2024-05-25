@extends('layouts.mainDash')
@section('title', 'Lista de Veiculos')
@section('content')
{{-- Seção para mostrar Veiculos --}}
<section class="secao_veiculo">
    <div class="container" id="caixa">
        <h1 class="text-center mb-4 mt-4">Veiculos</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Proprietario:</th>    
                        <th>Modelo:</th>
                        <th>Marca:</th>
                        <th>Placa:</th>                    
                        <th>Editar:</th>   
                        <th>Excluir:</th> 
                    </tr>
                </thead>
                <tbody>
                    {{-- tabela mostrando Veiculos --}}
                    @foreach($veiculosNome as $veiculo)  
                        <tr>
                            <td> <a href="{{ route('revisao.create', ['id' => $veiculo->id]) }}">{{  $veiculo->proprietario['nome']}}</a> </td>
                            <td> {{ $veiculo['modelo'] }}</td>
                            <td> {{ $veiculo['marca'] }}</td> 
                            <td> {{ $veiculo['placa'] }}</td>                          
                            <td>
                                <form action="{{ route('veiculo.edit', ['id' => $veiculo['id']]) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                            </td>
                            <td>                                                       
                                <form action="{{ route('veiculo.destroy', ['id' => $veiculo['id']]) }}" method="POST">
                                  {{ csrf_field() }}
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>              
                            </td>         
                        </tr> 
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="secao_veiculo_2">
    {{-- mostrando Veiculos por gênero --}}
    <div class="container" id="caixa_2">
        <h1 class="text-center mb-4">Veiculos por gênero</h1>
        <div class="container">
            <div class="card">   
                <div class="card-body">
                    <h5 class="card-title">Homens:</h5>
                    @if ($totalSexo > 0)
                        <p class="font">{{ $totalSexo['quantidadeHomens'] }}</p>
                    @endif                                                           
                </div>
            </div>
            <div class="card">                 
                <div class="card-body">                  
                    <h5 class="card-title">Mulheres:</h5>
                    @if ($totalSexo > 0)
                        <p class="font">{{ $totalSexo['quantidadeMulheres'] }}</p>
                    @endif                                  
                </div>
            </div>
            <div class="card">                      
                <div class="card-body">                  
                    <h5 class="card-title">Quem tem mais veículos:</h5>
                    @if ($totalSexo > 0)
                        <p class="font">{{ $totalSexo['maisVeiculos'] }}</p>
                    @endif                                  
                </div>
            </div>
        </div>
        <div class="graficos">
            <canvas id="graficoMarcas"></canvas>
        </div>   
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const marcas = @json($marcas->pluck('marca'));
        const totalVeiculos = @json($marcas->pluck('total_veiculos'));

        var ctx = document.getElementById('graficoMarcas').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: marcas,
                datasets: [{
                    label: 'Número de Veículos',
                    data: totalVeiculos,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
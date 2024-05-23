@extends('layouts.mainDash')
@section('title', 'Lista de proprietario')
@section('content')
{{-- Seção para mostrar proprietarios --}}
<section class="secao_proprietario">
    <div class="container" id="caixa">
        <h1 class="text-center mb-4">Proprietários</h1>
        <div class="buttons mt-4">  
            <form action="{{ route('proprietario.create') }}" method="GET">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>    
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
                        <th>Editar:</th>   
                        <th>Excluir:</th> 
                        <th>Mostrar:</th>               
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
                            <td>
                                <form action="{{ route('proprietario.edit', ['id' => $dono['id']]) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                            </td>
                            <td>                                                       
                                <form action="{{ route('proprietario.destroy', ['id' => $dono['id']]) }}" method="POST">
                                  {{ csrf_field() }}
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>              
                            </td>   
                            <td>                                                       
                                <form action="{{ route('proprietario.show', ['id' => $dono['id']]) }}" method="GET">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-primary">Mostrar</button>
                                </form>              
                            </td>      
                        </tr> 
                    @endforeach   
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="secao_proprietario_2">
    <div class="container" id="caixa_2">
        <div class="text-center">
            <h2 class="mb-4 mt-4">Idade média de homens e mulheres</h2>
            <canvas id="graficoPizza"></canvas> 
        </div>          
    </div>
</section>

<script src="js/proprietario_grafico.js"></script>

@endsection
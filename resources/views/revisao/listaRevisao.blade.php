@extends('layouts.mainDash')
@section('title', 'Lista de revisões')
@section('content')
@php
use Carbon\Carbon;
@endphp
{{-- Seção para mostrar revisões --}}
<section class="secao_revisao">
  <div class="container" id="caixa">
    <h1 class="text-center mb-4">revisões</h1>
    <form action="{{ route('revisao.revisoesPeriodo') }}" method="GET">
      {{ csrf_field() }}
      <div class="container" id="container_formulario">
        <div class="formulario">   
          <div class="form">
            <label for="data_inicio" class="form-label">Data Início:</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
          </div>
          <div class="form">
            <label for="data_fim" class="form-label">Data Fim:</label>
            <input type="date" class="form-control" id="data_fim" name="data_fim" required>
          </div>
        </div>
        <div class="buttons mb-2 mt-4">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table">
        <thead>
            <tr>
                <th>Placa:</th>
                <th>data:</th>
                <th>descricao:</th>    
                <th>Editar:</th>   
                <th>Excluir:</th> 
            </tr>
        </thead>
        <tbody>
          {{-- tabela mostrando revisões --}}
          @foreach($total as $revisao)  
            <tr>
              <td> {{ $revisao->veiculo['placa'] }}</td>
              <td> {{Carbon::parse($revisao->data)->format('d/m/Y') }}</td> 
              <td> {{ $revisao['descricao'] }}</td>
              <td>
                <form action="{{ route('revisao.edit', ['id' => $revisao['id']]) }}" method="GET">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>
              </td>
              <td>                                                       
                <form action="{{ route('revisao.destroy', ['id' => $revisao['id']]) }}" method="POST">
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
<section class="secao_revisao_2">
  <div class="container" id="caixa_2">
    <div class="container">
      <div class="card">  
        <div class="card-body">
          <h5 class="card-title">Pessoa com mais revisões:</h5>
          @if ($pessoasComMaisRevisoes->isNotEmpty())
            <p>{{ $pessoasComMaisRevisoes[0]->nome }}</p>
          @else
            <p>Nenhuma pessoa encontrada com revisões.</p>
          @endif                                                          
        </div>
      </div>
      <div class="card">  
        <div class="card-body">
          <h5 class="card-title">Média de Tempo Entre Revisões</h5>
          @if ($mediaTempo)
            <ul>
              @foreach ($mediaTempo as $cpf => $media)
                <li>Pessoa com CPF {{ $cpf }}: {{ round($media / 60, 2) }} minutos</li>
              @endforeach
            </ul>
          @else
            <p>Nenhum dado disponível.</p>
          @endif                                                        
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
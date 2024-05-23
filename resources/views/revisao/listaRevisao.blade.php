@extends('layouts.mainDash')
@section('title', 'Lista de revisões')
@section('content')
{{-- Seção para mostrar revisões --}}
<section class="secao_revisao">
  <div class="container" id="caixa">
    <h1 class="text-center mb-4">revisões</h1>
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
                <th>Placa:</th>
                <th>data:</th>
                <th>descricao:</th>    
                <th>Editar:</th>   
                <th>Excluir:</th> 
                <th>Mostrar:</th>                  
            </tr>
        </thead>
        <tbody>
          {{-- tabela mostrando revisões --}}
          @foreach($total as $revisao)  
            <tr>
              <td> {{ $revisao['placa'] }}</td>
              <td> {{ $revisao['data'] }}</td> 
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
              <td>                                                       
                <form action="{{ route('revisao.show', ['id' => $revisao['id']]) }}" method="GET">
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

@endsection
@extends('layouts.mainDash')
@section('title', 'Mostrar Revisão')
@section('content')

{{-- Seção para mostrar Revisão --}}
<section class="secao_cria_edita_mostra_revisao">
    <div class="container" id="caixa">
        <h1 class="text-center mb-2">Revisão</h1>
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
                    @foreach($revisoes as $revisao)  
                        <tr>
                            <td> {{ $revisao->veiculo['placa'] }}</td>
                            <td> {{ $revisao->data_formatada }}</td> 
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

@endsection
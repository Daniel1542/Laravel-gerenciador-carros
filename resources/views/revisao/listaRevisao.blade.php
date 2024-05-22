@extends('layouts.mainDash')
@section('title', 'Lista de revisões')
@section('content')
{{-- Seção para mostrar revisões --}}
<section class="secao_revisao">
  <div class="container" id="caixa">
    <h1 class="text-center mb-4">revisões</h1>
    <div class="table-responsive">
      <table class="table">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Cpf:</th>
                <th>Sexo:</th>     
                <th>Email:</th>
                <th>Telefone:</th>                 
            </tr>
        </thead>
        <tbody>
          {{-- tabela mostrando revisões --}}
          @foreach($total as $dono)  
            <tr>
                <td> {{ $dono['nome'] }}</td>
                <td> {{ $dono['cpf'] }}</td> 
                <td> {{ $dono['sexo'] }}</td>
                <td> {{ $dono['email'] }}</td>
                <td> {{ $dono['telefone'] }} </td>     
            </tr> 
          @endforeach   
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection
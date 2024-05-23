@extends('layouts.mainDash')
@section('title', 'Lista de revisões')
@section('content')
@php
use Carbon\Carbon;
@endphp
{{-- Seção para mostrar revisões --}}
<section class="secao_revisao">
  <div class="container" id="caixa">
    <h1 class="text-center mb-4">Marca com mais revisões</h1>
    <div class="table-responsive">
      <table class="table">
        <thead>
            <tr>
                <th>marca:</th>
                <th>total de revisões:</th>               
            </tr>
        </thead>
        <tbody>
          {{-- tabela mostrando revisões --}}
          @foreach($marcasMaisRevisoes as $marca)  
            <tr>
              <td> {{ $marca->marca}}</td>
              <td> {{ $marca->total_revisoes }}</td>
            </tr> 
          @endforeach   
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection
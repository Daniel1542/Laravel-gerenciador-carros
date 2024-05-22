@extends('layouts.mainDash')
@section('title', 'Dashboard')
@section('content')

<section class="secao_dash">
    <div id="caixa">
        <div class="container">
            <div class="card">   
                <div class="card-body">
                    <h5 class="card-title">Quantidade de veículos:</h5>
                    @if ($totalVeiculo > 0)
                        <p class="font">{{ $totalVeiculo }}</p>
                    @endif                                                           
                </div>
            </div>
            <div class="card">                      
                <div class="card-body">                  
                    <h5 class="card-title">Quantidade de proprietarios:</h5>
                    @if ($totalProprietario > 0)
                        <p class="font" >{{ $totalProprietario }}</p>
                    @endif                                  
                </div>
            </div>
            <div class="card">                      
                <div class="card-body">                  
                    <h5 class="card-title">Quantidade de revisões:</h5>
                    @if ($totalRevisao > 0)
                        <p class="font" >{{ $totalRevisao }}</p>
                    @endif                                  
                </div>
            </div>
        </div>
    </div>
</section>
  
@endsection
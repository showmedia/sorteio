@extends('layouts.user')

@section('title', 'Galdino & Filho Premiações')

@section('content')


<div class="header">
                            <span>
                            <ion-icon class="icon" name="compass"></ion-icon> 
                            <strong> Sorteios </strong> 
                            <small> Ganhadores</small>
                            </span>
                        </div>
                        @if(count($sorteios) == 0)
<div class="alert alert-info" role="alert">
    Ainda não tivemos a conclusão da venda das cotas do primeiro sorteio
</div>
@else
    @foreach($sorteios as $sorteio)
            <div class="vencedor">
            {{$sorteio->name}} <br>
           <span> {{$sorteio->sorteado}}</span>
           <img src="/img/sorteio1.jpeg" alt="imagem do ganhador do primeiro sorteio">
            </div>
    @endforeach
@endif

@endsection
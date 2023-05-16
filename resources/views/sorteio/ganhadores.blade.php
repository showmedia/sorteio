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
@php 
    $cont = 0;
@endphp
    @foreach($sorteios as $sorteio)
                                @php 
                                $cont++;
                            @endphp

            <div class="vencedor">

            {{$sorteio->name}} <br>

           <span> {{$sorteio->sorteado}}</span>

           @if($cont == 1)
           <img src="/img/sorteio1.jpeg" alt="imagem do ganhador do primeiro sorteio">
            @elseif($cont == 2)
            <img src="/img/sorteio2.jpeg" alt="imagem do ganhador do primeiro sorteio">
            @elseif($cont == 3)
            <img src="/img/sorteio3.jpg" alt="imagem do ganhador do terceiro sorteio">
            @elseif($cont == 4)
            <img src="/img/sorteio4.jpg" alt="imagem do ganhador do quarto sorteio">
            @elseif($cont == 5)
                <img src="/img/sorteio5.jpg" alt="imagem do ganhador do quarto sorteio">
            @endif

            </div>

    @endforeach

@endif



@endsection
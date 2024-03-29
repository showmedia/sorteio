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
    <img src="/img/sorteio2.jpeg" alt="imagem do ganhador do segundo sorteio">
@elseif($cont == 3)
    <img src="/img/sorteio3.jpg" alt="imagem do ganhador do terceiro sorteio">
@elseif($cont == 4)
    <img src="/img/sorteio4.jpg" alt="imagem do ganhador do quarto sorteio">
@elseif($cont == 5)
    <img src="/img/sorteio5.jpg" alt="imagem do ganhador do quarto sorteio">
@elseif($cont == 6)
    <img src="/img/sorteio6.jpg" alt="imagem do sexto sorteio">
@elseif($cont == 7)
    <img src="/img/sorteio7.jpeg" alt="imagem do setimo sorteio">
@elseif($cont == 8)
    <img src="/img/sorteio8.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 9)
    <img src="/img/sorteio9.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 10)
    <a href="https://www.instagram.com/reel/Cth5vp1NbfP/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio10.jpg" alt="">
    </a>
@elseif($cont == 11)
    <img src="/img/sorteio11.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 12)
    <img src="/img/sorteio12.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 13)
    <a href="https://www.instagram.com/reel/CuXKNNwpObf/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio13.jpg" alt="">
    </a>
@elseif($cont == 14)
    <img src="/img/sorteio14.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 15)
    <img src="/img/sorteio15.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 16)
    <img src="/img/sorteio16.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 17)
    <a href="https://www.instagram.com/reel/CvZyOy0Nx54/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio17.jpg" alt="">
    </a>
@elseif($cont == 18)
    <a href="https://www.instagram.com/reel/CvqjX97NIbb/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio18.jpg" alt="">
    </a>

@elseif($cont == 19)
    <img src="/img/sorteio19.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 20)
    <img src="/img/sorteio20.jpeg" alt="imagem do setimo sorteio">
@elseif($cont == 21)
    <a href="https://www.instagram.com/reel/CwyWxWSL1w7/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio21.jpg" alt="">
    </a>
@elseif($cont == 22)
    <a href="https://www.instagram.com/reel/CxDoT4ers6h/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio22.jpg" alt="">
    </a>
@elseif($cont == 23)
    <img src="/img/sorteio23.jpg" alt="imagem do setimo sorteio">
@elseif($cont == 24)
    <a href="https://www.instagram.com/reel/CxiO7TMr3T8/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" target="_blank"> 
        <img src="/img/sorteio24.jpg" alt="">
    </a>
@elseif($cont == 25)
    <img src="/img/sorteio25.jpg" alt="imagem do setimo sorteio">
@endif
</div>

    @endforeach

@endif



@endsection
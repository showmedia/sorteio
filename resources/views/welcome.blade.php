@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="flash"></ion-icon> 

                            <strong>Prêmios</strong> 

                            <small>Escolha sua sorte</small>

                            </span>

                        </div>



                        <div class="body">

                            @foreach($sorteios as $sorteio)

                                @if($sorteio->status == 0 && $sorteio->is_favorite == 1)

                                <div class="item-show" onclick="link('/user/sorteio/show/{{$sorteio->id}}')">

                                    <img src="/img/cursos/{{$sorteio->image}}" alt="">

                                    <div class="info-item">

                                        <h3> {{$sorteio->name}} </h3>

                                        <small> Extração da Loteria Federal </small>

                    @if($sorteio->qtnCotas <= $sorteio->qtnVenda)
                    <div class="info-pisca bg-danger">

Compre agora!

</div>
                    @else
                                        <div class="info-pisca">

                                            Compre agora!

                                        </div>
                @endif
                                    </div>

                                </div>

                                @endif

                            @endforeach

                            @foreach($sorteios as $sorteio)

                                @if($sorteio->status == 0 && $sorteio->is_favorite == 0)

                                    <div class="item-sorteio" onclick="link('/user/sorteio/show/{{$sorteio->id}}')">

                                        <img src="/img/cursos/{{$sorteio->image}}" alt="{{$sorteio->name}}">

                                        <div class="info-item">

                                            <strong> {{$sorteio->name}} </strong><br>

                                            <small> {{mb_strimwidth($sorteio->regulamento, 0, 50, "...")}} </small>

                                            <div class="info-pisca">

                                                Concorra agora!

                                            </div>

                                        </div>

                                    </div>

                                @endif

                            @endforeach



                            <div class="duvida" id="duvida" onclick="link('/contato')">

                                <p>Dúvidas<br>

                                    <small>Fale conosco</small>

                                </p> 

                            </div>



                            <div class="header">

                                <span>

                                <ion-icon class="icon" name="golf"></ion-icon>

    

                                <strong>Ganhadores</strong> 

                                <small>Premiados</small>

                                </span>

                            </div>

                            <!-- Adicionar lista de ganhadores dos ultimos sorteios -->
                            @php 
    $cont = 0;
@endphp
         
                            @foreach($sorteios as $sorteio)
                            @php 
                                $cont++;
                            @endphp
                       @if($sorteio->status == 1)

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
            @elseif($cont == 14)
                <img src="/img/sorteio14.jpg" alt="imagem do setimo sorteio">
            @endif
            </div>

                                @endif

                            @endforeach

                        



                        </div>



@endsection
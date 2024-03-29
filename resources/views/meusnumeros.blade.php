@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="cart-outline"></ion-icon> 

                            <strong> {{Auth::user()->name}} </strong> 

                            <small> Meus Númemros</small>

                            </span>
                            @if(Auth::user()->nivel == 1)
                                <form action="/compras/deletar/{{Auth::user()->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Limpar todas Compras</button>
                                </form>
                            @endif

                        </div>



                        @foreach(Auth::user()->compras as $compra)

                                    <div class="body">

                                    <div class="item-sorteio" onclick="link('/user/sorteio/show/{{$compra->sorteio->id}}')">

                                        <img src="/img/cursos/{{$compra->sorteio->image}}" alt="{{$compra->sorteio->name}}"><br>

                                        <div class="info-item">

                                            <strong> {{$compra->sorteio->name}} </strong><br>

                                            <small> {{mb_strimwidth($compra->sorteio->regulamento, 0, 50, "...")}} </small>

                                            @if($compra->status == 1)

                                                <div class="info-pisca2 {{$compra->sorteio->status ? 'bg-danger' : ''}}">

                                                @if($compra->sorteio->status == 0)

                                                Concorrendo!

                                                @else

                                                Concluído 

                                                @endif

                                            </div>

                                            

                                            @else

                                                <div class="info-pisca2 info-danger bg-danger">

                                                    Pagamento Pendente 

                                                    

                                                </div>

                                                <a href="https://wa.me/5511916853771">Mandar comprovante</a>

                                            @endif

                                        </div>

                                    </div>

                                    </div>

                                   <div class="cotas"  onclick="link('venda/show/{{$compra->id}}')">

                                   @foreach($compra->cotas as $cota)
                                    @if($compra->status == 0)
                                        ???? 
                                    @else 
                                   @if($cota->number == $compra->sorteio->sorteado)

                                    @if($compra->sorteio->tipo == 0)

                                        <div class="ct premiado">{{sprintf("%04s",$cota->number)}}</div>

                                    @else 
                                        <div class="ct premiado">{{sprintf("%04s",$cota->number)}}</div>
                                    @endif

                                   @else

                                    @if($compra->sorteio->tipo == 0)

                                        <div class="ct">{{sprintf("%04s",$cota->number)}}</div>


                                    @else 
                                        <div class="ct">{{sprintf("%04s",$cota->number)}}</div>
                                    @endif    
                                  @endif
                                    @endif
                                    @endforeach

                                   </div>

                        @endforeach

@endsection
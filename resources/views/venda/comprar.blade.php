@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="cart-outline"></ion-icon> 

                            <strong>Compra cotas </strong> 

                            <small> check-out</small>

                            </span>

                        </div>



                        <div class="alert alert-info" role="alert">

                            Você esta adquirindo {{count($venda->cotas)}} cota(s) para o sorteio <b>"{{$venda->sorteio->name}}"</b>. 

                            Confira suas cotas abaixo e preencha seus dados. <br>
                            <br>
                            obs: Seus números já estão reservados, continue para confirmar sua compra, caso não realize o pagamento em até 15 minutos, essa compra será cancelada.

                        </div>



                        <div class="cotas">

                            

                            @foreach($venda->cotas as $cota)
                                @if($venda->sorteio->tipo == 0)
                                <!-- <div class="ct">{{sprintf("%04s",$cota->number)}}</div> -->
                                ???
                                @else 
                                <!-- <div class="ct">{{sprintf("%04s",$cota->number)}}</div> -->
                                ????
                                @endif
                            @endforeach

                       

                        </div>

<br>

                        <div class="form-create">

    

    <form action="/venda/confirmar/{{$venda->id}}" method="GET">

        <div class="controle">



        <div class="alert alert-warning" role="alert">

                Informe seu e-mail para continuar!

            </div>

      



            <label for="email" class="group-input">

                <input type="email" required="required"

                @auth value="{{Auth::user()->email}}"@endauth

                name="email" id="email">

                <span>Informe seu E-mail</span>

            </label>

            <label for="phone" class="group-input">

                <input type="text" required="required"

                @auth value="{{Auth::user()->phone}}"@endauth

                name="phone" id="phone">

                <span>Informe seu Whatsapp</span>

            </label>

            <div class="container-btn">

                <button class="btn btn-primary btn-form">   

                Continuar

                <ion-icon class="icon" name="send"></ion-icon> 

                </button>

            </div>

        </div>

        

    </form>

</div>



@endsection
@extends('layouts.user')



@section('title', 'Galdino & Filho Premiações')



@section('content')



                        <div class="header">

                            <span>

                            <ion-icon class="icon" name="cart-outline"></ion-icon> 

                            <strong>Venda Cota pelo talão </strong> 

                            <small> Editar Cliente Venda Talão</small>

                            </span>

                        </div>



                        <div class="alert alert-info" role="alert">

                            Você esta vendendo cota(s) para o sorteio com base no talão, com números separados para este fim,

                            lembre-se, esteja atento para não adicionar aqui, e no talão, número que foi separado.

                        </div>



                 

<br><br>

                        <div class="form-create">

    

    <form action="/nota/{{$nota->id}}" method="POST">

        @csrf
        @method('put')

        <div class="controle">



        <div class="alert alert-warning" role="alert">

               Edite os dados abaixo, e clique em salvar!

            </div>

      



            <label for="name" class="group-input">

                <input type="text" required="required"

                name="name" id="name" value="{{$nota->name ?? ''}}">

                <span>Nome</span>

            </label>

            <label for="email" class="group-input">

                <input type="email" 

                name="email" id="email" value="{{$nota->email ?? ''}}">

                <span>E-mail</span>

            </label>

            <label for="phone" class="group-input">

                <input type="text"

                name="phone" id="phone" value="{{$nota->phone ?? ''}}">

                <span>Whatsapp</span>

            </label>

            <div class="container-btn">

                <button class="btn btn-primary btn-form">   

                Salvar

                <ion-icon class="icon" name="send"></ion-icon> 

                </button>

            </div>

        </div>

        

    </form>

</div>



@endsection
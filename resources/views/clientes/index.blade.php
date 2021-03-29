@extends('clientes/layout')

@section('titulo', 'Home')

@section('conteudo')
    <style>
        .card-title {
            background-color: #5F5AE6;
        }

        .card-button-link {

            background-color: #61C44B;
        }

    </style>
     @if (session('mensagem'))
     <div class="alert alert-success" style="margin: 10px">
         {{ session('mensagem') }}
     </div>
 @endif
    <div class="d-flex justify-content-start " style="padding-top: 40px; ">
       

        <div class="card text-white  mb-3 mx-auto card-itens card-title " style="max-width: 18rem; padding: 3px">
            <h3 class="card-title mx-auto" style="padding: 5px">Cadastrar Clientes</h3>
            <div class="card-body bg-light text-dark">
                <p class="card-text ">
                    Preencha dados de seus clientes, assim podendo manipular os mesmos</p>
            </div>
            <a href="{{ route('clientes.create') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                    border-style: outset;
                    border-color: #3E872E;
                    border-width: 3px;">
                <h5>Cadastrar Cliente </h5>
            </a>
        </div>
    </div>

@endsection

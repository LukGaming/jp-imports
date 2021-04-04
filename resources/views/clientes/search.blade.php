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
   @livewire('search-clientes')
@endsection

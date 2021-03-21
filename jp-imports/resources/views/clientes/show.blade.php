@extends('clientes/layout')

@section('titulo', 'Home')

@section('conteudo')
@if (session('mensagem'))
<div class="alert alert-success">
    {{ session('mensagem') }}
</div>
@endif


    {{$cliente->nome}}<br>
    {{$cliente->email}}<br>
    {{$cliente->descricao_cliente}}<br>
    {{$cliente->facebook}}<br>
    {{$cliente->instagram}}<br>
    {{$cliente->itens_vendidos}}<br>

   @if ($telefones)
       @for ($i = 0; $i < count($telefones); $i++)
       <br>{{$telefones[$i]->numero_telefone}}
       @endfor
   @endif

    @endsection

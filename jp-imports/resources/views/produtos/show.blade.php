@extends('clientes/layout')

@section('titulo', 'Dados do Cliente')

@section('conteudo')


    <div class="border border-dark " style="margin: 20px; padding: 10px">
        <div class="d-flex justify-content-center">
            <h2>Visualizando Produto</h2>
        </div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Nome: {{ $produto->nome }}</h5>
        </div>
        <h5 class="" style="padding: 10px; margin: 5px">Descrição</h5>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <pre> {{ $produto->descricao }}</pre>
        </div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Valor: {{$produto->valor}}</h5>
        </div>        
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
           
            <h5>Dia da Compra do Produto:   <input type="date" value="{{$produto->horario_compra}}" disabled></h5>
        </div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Criação do Produto no site: {{$produto->created_at}}</h5>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Usuário que criou o Produto:  {{$criador_produto}}</h5>
        </div>
    </div>


@endsection

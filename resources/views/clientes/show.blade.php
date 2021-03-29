@extends('clientes/layout')

@section('titulo', 'Dados do Cliente')

@section('conteudo')
    @if (session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif

    <div style=" margin-top:20px; border: solid 5px; padding: 10px; border-radius: 20px">
        <div class="d-flex justify-content-center">
            <h2>Cliente - {{ $cliente->nome }}</h2>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Nome: {{ $cliente->nome }}</h5>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Email: {{ $cliente->email }}</h5>
        </div>
        @if ($cliente->caminho_imagem_cliente)
            <div class="border border-dark w-25" style="padding: 10px; margin: 5px">
                <img src="{{ asset($cliente->caminho_imagem_cliente) }}" class="w-100 ">
            </div>
        @endif
        <h5 class="" style="padding: 10px; margin: 5px">Descrição</h5>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <pre> {{ $cliente->descricao_cliente }}</pre>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <a href="http://facebook.com/{{ $cliente->facebook }}" class="btn btn-primary" target="_blank">facebook do
                cliente</a>
            <a href="http://instagram.com/{{ $cliente->instagram }}" class="btn btn-primary" target="_blank">Instagram do
                cliente</a>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">Qtd. Itens Comprados:
            {{ $cliente->itens_vendidos }}</div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            @if ($telefones)
                @for ($i = 0; $i < count($telefones); $i++)
                    <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
                        <p>Telefone {{ $i + 1 }}: {{ $telefones[$i]->numero_telefone }}</p>

                    </div>
                @endfor
            @endif
        </div>
        <div class="d-flex justify-content-end" style="margin: 10px">
            <a href="{{ route('clientes.edit', $cliente->id) }}"><button class="btn btn-success">Editar
                    Cliente</button></a>
        </div>
    @endsection

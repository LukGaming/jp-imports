@extends('clientes/layout')

@section('titulo', 'Home')

@section('conteudo')
    @if (session('mensagem'))
        <div class="alert alert-success"   style="padding: 15px; margin-top:20px">
            {{ session('mensagem') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger "  style="padding: 15px; margin-top:20px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('ultimo_produto_cadastrado'))
    <div class="alert alert-success">
        @php
            echo '<a href=' . url('produto/' . session('ultimo_produto_cadastrado')) . '>Ver Cliente recém cadastrado</a>';
            
        @endphp
        </div>
    @endif

    <div class="border border-dark rounded" style="padding: 15px; margin-top:20px">
        <div class="d-flex justify-content-center">
            <h1>Cadastrando Produtos</h1>
        </div>
        <form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="padding: 10px">
                <label for="nome">Nome </label>
                <input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name="nome"
                    value="{{ old('nome') }}">
            </div>         


            <div class="form-group" style="padding: 10px">
                <label for="descricao">Descrição do Produto</label>
                <textarea class="form-control" id="descricao" rows="3"
                    name="descricao">{{ old('descricao') }}</textarea>
            </div>


            <div class="form-group" style="padding: 10px">
                <label for="valor">Valor do Produto </label>
                <input type="number" step="any"  class="form-control" id="valor" placeholder="Valor do Produto" name="valor"
                    value="{{ old('valor') }}">
            </div> 

            <div class="form-group" style="padding: 10px">
                <label for="horario_compra">Data de Compra do Produto</label>
                <input type="date"  class="form-control" id="horario_compra" placeholder="horario_compra" name="horario_compra"
                    value="{{ old('horario_compra') }}">
            </div>













            <input type="file" name="imagens_produto[]" id="imagens_produto" multiple>
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>
    </div>
    <script>
        $phones = $("#phones"); //Selecionando a div que irão os phone
        $btnAdicionar = $("#adicionar"); //Selecionando botão para adicionar
        $btnAdicionar.click(AdicionarNovoNumero); //Adicionando os novos campos de número
        function AdicionarNovoNumero(name) {
            $phones.append(
                "<div class='div-numero' style='margin-top: 10px'><input type='text' name='phone[]' id='phone'>&nbsp;&nbsp;<button type='button' class='btn btn-danger' onclick='RemoverNumero(this)'> Remover Número</button></div>"
            );
        }

        function RemoverNumero(obj) {
            //$numeros = $(".div-numero this.id").empty();
            console.log(obj);
            $('.div-numero').find(obj).parent().remove();
        }

    </script>
@endsection

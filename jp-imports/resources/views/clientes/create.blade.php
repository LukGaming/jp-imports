@extends('clientes/layout')

@section('titulo', 'Home')

@section('conteudo')
    @if (session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('ultimo_cliente_cadastrado'))
        <div class="alert alert-success">
            @php
                echo '<a href=' . url('clientes/' . session('ultimo_cliente_cadastrado')) . '>Ver Cliente recém cadastrado</a>';
                
            @endphp
        </div>
    @endif
    <h1>Cadastrando Clientes</h1>
    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome </label>
            <input type="text" class="form-control" id="nome" placeholder="Nome do cliente" name="nome"
                value="{{ old('nome') }}">
        </div>
        <div class="form-group">
            <label for="email">Email do cliente</label>
            <input type="text" class="form-control" id="email" placeholder="Email de contato do cliente" name="email"
                value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="descricao_cliente">Descrição do Cliente</label>
            <textarea class="form-control" id="descricao_cliente" rows="3"
                name="descricao_cliente">{{ old('descricao_cliente') }}</textarea>
        </div>
        <label for="basic-url">Facebook</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">facebook.com/</span>
            </div>
            <input type="text" class="form-control" id="facebook" placeholder="Link do facebook do cliente" name="facebook"
                value="{{ old('facebook') }}">
        </div>
        <label for="basic-url">Instagram</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">instagram.com/</span>
            </div>
            <input type="text" class="form-control" id="instagram" placeholder="Link do instagram do cliente"
                name="instagram" value="{{ old('instagram') }}">
        </div>

        <br>
        <label for="phones">Telefones: </label><br>
        <div class="form-group" id="phones">
            @if (old('phone'))
                @foreach (old('phone') as $phone)
                    <div class="div-numero">
                        <input type="text" name="phone[]" id="phone" value="{{ $phone }}">&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" onclick="RemoverNumero(this)"> Remover Número</button>
                    </div>
                @endforeach
                <button type="button" class="btn btn-success" id="adicionar">Adicionar mais números</button>
            @else
                <div class="div-numero">
                    <input type="text" name="phone[]" id="phone">&nbsp;&nbsp;<button type="button" class="btn btn-danger"
                        onclick="RemoverNumero(this)"> Remover Número</button>
                </div>
        </div>
        <button type="button" class="btn btn-success" id="adicionar">Adicionar mais números</button>
        <br>
        @endif

        <br>
        <br>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" id="btnCriar">Cadastrar Cliente</button>
        </div>
    </form>
    </div>


    <br><br><br>
    <script>
        $phones = $("#phones"); //Selecionando a div que irão os phone
        $btnAdicionar = $("#adicionar"); //Selecionando botão para adicionar
        $btnAdicionar.click(AdicionarNovoNumero); //Adicionando os novos campos de número
        function AdicionarNovoNumero(name) {
            $phones.append(
                "<div class='div-numero'><br><br><input type='text' name='phone[]' id='phone'>&nbsp;&nbsp;<button type='button' class='btn btn-danger' onclick='RemoverNumero(this)'> Remover Número</button></div>"
            );
        }

        function RemoverNumero(obj) {
            //$numeros = $(".div-numero this.id").empty();
            console.log(obj);
            $('.div-numero').find(obj).parent().remove();
        }

    </script>
@endsection

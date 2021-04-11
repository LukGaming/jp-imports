@extends('clientes/layout')

@section('titulo', 'Home')

@section('conteudo')
    @livewireStyles
    @livewire('editar-produtos', ['produto' => $produto->id])
    @livewire('editar-imagens-produto', ['produto' => $produto->id])
   
    @livewireStyles
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

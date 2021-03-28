@extends('clientes/layout')

@section('titulo', 'Dados do Cliente')

@section('conteudo')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="border border-dark " style="margin: 20px; padding: 10px">
        <div class="d-flex justify-content-center">
            <h2>Visualizando Produto</h2>
        </div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 10px">
            <h5>Nome: {{ $produto->nome }}</h5>
        </div>
        <div class="row d-flex justify-content-center ">
           
        @if (count($imagens) > 0)
        <div class="d-flex justify-content-center">
            <h5>
        Imagens do Produto
    </h5>
    </div>
            <div class="border border-dark rounded w-50">
                <div class="row d-flex justify-content-center ">
                    @for ($i = 0; $i < count($imagens); $i++)
                        @if ($i % 3 == 0 && $i > 1) 
                        <p class="border-top border-dark"></p>
                        @endif
                        <img src="{{ asset($imagens[$i]->caminho_imagem_produto) }}" class="w-25 border border-dark rounded" style="padding:15px; margin: 15px">
                    @endfor
                </div>
            </div>
        </div>
        @else
        @endif
        <h5 class="" style="padding: 10px; margin: 5px">Descrição</h5>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <pre> {{ $produto->descricao }}</pre>
        </div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Valor: {{ $produto->valor }}</h5>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">

            <h5>Dia da Compra do Produto: <input type="date" value="{{ $produto->horario_compra }}" disabled></h5>
        </div>

        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Criação do Produto no site: {{ $produto->created_at }}</h5>
        </div>
        <div class="border border-dark rounded" style="padding: 10px; margin: 5px">
            <h5>Usuário que criou o Produto: {{ $criador_produto }}</h5>
        </div>
    </div>

    <script>
        /*$imagens = $('.imagens');
                    $tamanho_imagem_width = $('#imagem').width();
                    $tamanho_imagem_height = $('#imagem').height();
                     console.log($imagens.length)
                    for(i=0; i<$imagens.length; i++){
                        $imagens[i].css('width', $tamanho_imagem_width);
                    }
                    $imagens[1].css('width', $tamanho_imagem_width);*/

    </script>


@endsection

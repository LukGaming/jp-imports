<div style="padding-top: 10px;">
    <form method="GET" wire:submit.prevent="searchClientes">
        @csrf
        <div class="row" style="padding-left: 10px">
            <label for="search" style="padding-left: 10px">Buscar Clientes</label>
            <input type="text" class="col-7 inputfieldsofsite" id="search" aria-describedby="emailHelp"
                placeholder="Digite o nome do Cliente" name="search" style="padding: 5px; margin: 10px"
                wire:model.debounce.500ms="search">
            <div class="col-4">
                <input type="submit" value="Buscar" class=" btn btn-primary" style="margin: 10px">
            </div>
        </div>
    </form>


    <!--Quando a página Carregar já aparecerá estes clientes-->
    @if ($search == '')
        <div class="row">
            @foreach ($initialClientes as $cliente)
                <div class="col-sm-4">
                    <div class="card text-white  card-itens card-title " style=" padding: 3px">
                        <h3 class="card-title mx-auto h5 " style="">{{ $cliente->nome }}</h3>
                        <div class=" bg-light text-dark">
                            <p class="card-text ">
                                <div class="d-flex justify-content-center">
                                <img src=" {{ url($cliente->caminho_imagem_cliente) }}" alt="" class="img-fluid"
                                    style="height: 200px">
                                </div>
                            </p>
                        </div>
                        <a href="{{ url('clientes/' . $cliente->id) }}"
                            class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                        border-style: outset;
                        border-color: #3E872E;
                        border-width: 3px;">
                            <h5>Ir para perfil do Cliente</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            @foreach ($initialClientes as $cliente)
                <div class="col-sm-4">
                    <div class="card text-white  card-itens card-title " style=" padding: 3px">
                        <h3 class="card-title mx-auto h5 " style="">{{ $cliente->nome }}</h3>
                        <div class=" bg-light text-dark">
                            <p class="card-text ">
                                <div class="d-flex justify-content-center">
                                <img src=" {{ url($cliente->caminho_imagem_cliente) }}" alt="" class="img-fluid"
                                    style="height: 200px">
                                </div>
                            </p>
                        </div>
                        <a href="{{ url('clientes/' . $cliente->id) }}"
                            class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                                        border-style: outset;
                                        border-color: #3E872E;
                                        border-width: 3px;">
                            <h5>Ir para perfil do Cliente</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

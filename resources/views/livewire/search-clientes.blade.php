<div style="padding-top: 10px;">
    <form method="POST" wire:submit.prevent="searchClientes">
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



    @if ($clientesThatCameFromSearch != null && $search != '')
        @if ($count == 1)
            @foreach ($clientesThatCameFromSearch as $cliente)
                {{ $cliente->nome }}
            @endforeach
        @endif
    @endif
    @if ($count == 0 && $search != '')
        Nenhum Cliente Encontrado
    @endif
    @if ($search == '')
        Mostrando Todos os Clientes com paginação
    @endif

</div>

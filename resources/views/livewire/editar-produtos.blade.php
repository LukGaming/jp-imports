<div>


    @if (session()->has('produto_editado'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
        <div class="row">
            <div class="col-11">
                <strong>Produto editado com sucesso!</strong> 
            </div>
            <div class="col-1">
                <button type="button" class="close border-0 " data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    














    <div class="form-group" style="padding: 10px">
        <label for="nome">Nome </label>
        <input type="text" class="form-control" id="nome" placeholder="Nome do Produto" name="nome"
            wire:model.defer="nome">
    </div>

    <div class="form-group" style="padding: 10px">
        <label for="descricao">Descrição do Produto</label>
        <textarea class="form-control" id="descricao" rows="3" name="descricao" wire:model.defer="descricao"></textarea>
    </div>
    <div class="form-group" style="padding: 10px">
        <label for="valor">Valor do Produto </label>
        <input type="number" step="any" class="form-control" id="valor" placeholder="Valor do Produto" name="valor"
            wire:model.defer="valor">
    </div>
    <div class="form-group" style="padding: 10px">
        <label for="horario_compra">Data de Compra do Produto</label>
        <input type="date" class="form-control" id="horario_compra" placeholder="horario_compra" name="horario_compra"
            wire:model.defer="horario_compra">
    </div>
    <div class="d-flex justify-content-center">
        <input type="submit" value="Salvar Alterações" class="btn btn-primary" wire:click="salvarAlteracoes()">
    </div>
</div>

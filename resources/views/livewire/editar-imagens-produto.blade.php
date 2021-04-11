<div class="bg-dark text-light">
    @if (session()->has('imagem_removida'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
            <div class="row">
                <div class="col-11">
                    <strong>Imagem Removida Com sucesso!</strong>
                </div>
                <div class="col-1">
                    <button type="button" class="close border-0 " data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" class="">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    @if (count($imagens_produtos) > 0)
        <form wire:submit.prevent="">
            <div class="d-flex justify-content-center">
                <h5>
                    Imagens do Produto
                </h5>
            </div>
            <div class="d-flex justify-content-center">
                <div class="border border-dark rounded w-50 ">
                    <div class="row d-flex justify-content-center ">
                        @for ($i = 0; $i < count($imagens_produtos); $i++)
                            @if ($i % 3 == 0 && $i > 1) <p class="border-to
                            p border-dark div-img " > </p> @endif
                            <div class="border-dark rounded w-25 border bg-light divs-bordas" style="margin: 10px; " >
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger btn-remover-imagens" type="submit" style="margin-top: 10px"
                                        wire:click="removerImagem({{ $imagens_produtos[$i]->id }}, '{{ $imagens_produtos[$i]->caminho_imagem_produto }}')">Remover</button>
                                </div>
                                <div class="" style="margin: 10px">
                                <img src="{{ asset($imagens_produtos[$i]->caminho_imagem_produto) }}"
                                    class="img-fluid imagens  " style="">
                                </div>
                                
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </form>
    @else
    @endif
    <div>
        <div class="border border-dark rounded" style="margin: 10px">
            <div class="d-flex justify-content-center" style="margin: 10px">
                <div class="h5">Enviar novas Imagens</div>
            </div>
            <hr>
            @if (session()->has('nenhuma_imagem_selecionada'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <div class="row">
                        <div class="col-11">
                            <strong>Nenhuma Imagem selecionada!</strong>
                        </div>
                        <div class="col-1">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <input type="file" name="image" id="image" wire:model="imagens" class="form-control-file"
                style="padding: 20px" multiple>

            <button class="btn btn-success" wire:click="adicionarImagem">Enviar Imagens</button>
        </div>

    </div>
</div>
<script>
    window.addEventListener('imagens_enviadas', event => {
        document.getElementById("image").value = "";
    })

</script>

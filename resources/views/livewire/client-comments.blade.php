<div style="margin-top:20px; border: solid 5px; padding: 10px; border-radius: 20px; margin-bottom: 20px">
    <div>
        @if (session()->has('nota_vazia'))
            <div class="alert alert-danger">
                {{ session('nota_vazia') }}
            </div>
        @endif
        @if (session()->has('nota_adicionada'))
            <div class="alert alert-success">
                {{ session('nota_adicionada') }}
            </div>
        @endif
        @if (session()->has('nota_removida'))
            <div class="alert alert-success">
                {{ session('nota_removida') }}
            </div>
        @endif
        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">
                    <h6>Adicionar Notas a este cliente</h6>
                </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    wire:model.lazy="nota_cliente"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" value="Adicionar Nota" class="btn btn-success" style="margin: 10px">
            </div>

            @if ($notas_anteriores)

                <div wire:poll.10000ms></div>
                @foreach ($notas_anteriores->reverse() as $notas)
                    @if ($loop->first)
                        <hr>
                        <div class="border border-dark">
                    @endif

                    <div class="border border-dark" style="padding: 5px">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h6>Nota Criada Por: {{ $notas->created_by }}</h6>
                            </div>
                            <div class="p-2 bd-highlight">
                                <h6>Horário de Criação da Nota:
                                    {{ \Carbon\Carbon::parse($notas->created_at)->format('d-m-Y h:i:s') }}
                                </h6>
                            </div>
                            <div class="p-2 bd-highlight">
                                <input class="btn btn-danger " type="reset" value="Remover Nota"
                                    wire:click="removerNota({{ $notas->id }})">
                            </div>
                        </div>
                        <hr>
                        <h6>
                            <pre>
                            {{ $notas->body }}
                        </pre>
                        </h6>
                    </div>
                    @if ($loop->first)
    </div>
    @endif
    @endforeach
</div>

@endif

</form>

</div>
</div>
<script>
$("textarea").each(function () {
    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
  }).on("input", function () {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>
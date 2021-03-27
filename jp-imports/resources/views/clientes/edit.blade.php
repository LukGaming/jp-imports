@extends('clientes/layout')

@section('titulo', 'Home')

@section('conteudo')
    @if (session('mensagem'))
        <div class="alert alert-success" style="margin-top: 10px">
            {{ session('mensagem') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 10px">
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
    <div class="border border-dark rounded" style="padding: 15px; margin-top:20px">
        <div class="border border-dark rounded" style="padding: 15px; margin-top:20px">
            <div class="d-flex justify-content-center">
                <h1>Editando Cliente {{ $cliente->nome }}</h1>
            </div>
            <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nome">Nome </label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome do cliente" name="nome"
                        value="{{ $cliente->nome }}">
                </div>
                <div class="form-group">
                    <label for="email">Email do cliente</label>
                    <input type="text" class="form-control" id="email" placeholder="Email de contato do cliente"
                        name="email" value="{{ $cliente->email }}">
                </div>
                <div class="form-group">
                    <label for="descricao_cliente">Descrição do Cliente</label>
                    <textarea class="form-control" id="descricao_cliente" rows="3"
                        name="descricao_cliente">{{ $cliente->descricao_cliente }}</textarea>
                </div>
                <label for="basic-url">Facebook</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">facebook.com/</span>
                    </div>
                    <input type="text" class="form-control" id="facebook" placeholder="Link do facebook do cliente"
                        name="facebook" value="{{ $cliente->facebook }}">
                </div>
                <label for="basic-url">Instagram</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">instagram.com/</span>
                    </div>
                    <input type="text" class="form-control" id="instagram" placeholder="Link do instagram do cliente"
                        name="instagram" value="{{ $cliente->instagram }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Quantidade de Itens Vendidos</label><br>
                    <input type="number" value="{{ $cliente->itens_vendidos }}" name="itens_vendidos">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" id="btnCriar">Salvar Altrações</button>
            </form>
            <form action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}" method="POST"
                style="margin-left: 40px">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Excluir Cliente">
            </form>
        </div>
    </div>
    <div class="border border-dark rounded" style="padding: 15px; margin-top:20px">
        <div class="d-flex justify-content-center">
            <h5>Editando Telefones do Cliente </h5>
        </div>
        @if (count($telefones) != 0)
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-96">
                Remover Números de Telefone
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-96">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Remover Números de Telefone</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            @for ($i = 0; $i < count($telefones); $i++)
                                <form
                                    action="{{ route('TelefoneController.removerTelefone', ['id_telefone' => $telefones[$i]->id]) }}"
                                    method="post">
                                    @csrf
                                    <div style="margin: 10px">
                                        <h5>Telefone: {{ $telefones[$i]->numero_telefone }} <input class="btn btn-danger"
                                                type="submit" value="Excluir Telefone"><br></h5>
                                        <hr>
                                    </div>
                            @endfor
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>



            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal-97">
                Adicionar mais números de telefone
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-97">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Adicione mais números!</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">

                            <form action="{{ route('TelefoneController.adicionarNumeros', $cliente->id) }}"
                                method="POST">
                                @csrf
                                <label for="phones">Telefones: </label><br>
                                <div class="form-group" id="phones">

                                    <div class="div-numero">
                                        <input type="text" name="phone[]" id="phone">&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" onclick="RemoverNumero(this)">
                                            Remover Número</button>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-success" id="adicionar">Adicionar mais
                                    números</button>
                                <br><br>
                                <input type="submit" class="btn btn-primary" value="Salvar Números">
                            </form>                          
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>












        @else



            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-99">
                Adicionando Telefones ao cliente
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-99">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Adicionar Telefones</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('TelefoneController.adicionarNumeros', $cliente->id) }}"
                                method="POST">
                                @csrf
                                <label for="phones">Telefones: </label><br>
                                <div class="form-group" id="phones">

                                    <div class="div-numero">
                                        <input type="text" name="phone[]" id="phone">&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" onclick="RemoverNumero(this)">
                                            Remover Número</button>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-success" id="adicionar">Adicionar mais
                                    números</button>
                                <br><br>
                                <input type="submit" class="btn btn-primary" value="Salvar Números">
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
        @endif
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

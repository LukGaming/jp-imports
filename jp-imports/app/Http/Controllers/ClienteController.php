<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\TelefoneController;
use App\Http\Requests\ClienteValidator;
use App\Models\Telefone;
use App\Http\Controllers\ImagemClienteController;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteValidator $request)
    {
        //Enviando imagem para ser salva
        if ($request->imagem_cliente) {
            $caminho_imagem = (new ImagemClienteController())->storeImage($request);
            $request['caminho_imagem_cliente'] = $caminho_imagem;
        } else {
            $request['caminho_imagem_cliente'] = null;
        }

        $cliente = Cliente::create($request->all());
        if ($request->phone) {
            //Criar um controlador de Telefone, pois usaremos ele depois
            //Enviar os dados do request para salvar no telefone também
            $telefones = new TelefoneController();
            $telefones->store($request, $cliente);
        }
        if ($cliente) { //Se cliente for cadastrado sem erros, retornar página de criar novamente
            $mensagem = "Cliente " . $cliente->nome . " criado com sucesso ";
            return redirect('clientes/create')->with(['mensagem' => $mensagem, 'ultimo_cliente_cadastrado' => $cliente->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $telefones = (new Telefone())->telefonesDoUsuario($cliente->id);
        return view('clientes/show', ['cliente' => $cliente, 'telefones' => $telefones]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $telefones = Telefone::where('id_cliente', $cliente->id)->get();
        return view('clientes/edit', ['cliente' => $cliente, 'telefones' => $telefones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteValidator $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        $mensagem = "Dados de cliente editado com sucesso!";
        return redirect('clientes/' . $cliente->id . '/edit')->with('mensagem', $mensagem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //Achando os números de telefone deste cliente
        Telefone::where('id_cliente', $cliente->id)->delete();
        $cliente->delete();
        $mensagem = "Cliente " . $cliente->nome . " Removido com sucesso!";
        return redirect('clientes')->with('mensagem', $mensagem);
    }
}

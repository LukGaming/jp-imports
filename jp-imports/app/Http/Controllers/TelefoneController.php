<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Telefone;
use Illuminate\Http\Request;


class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_cliente)
    {   //fazer uma Query separada
        //Para cada um dos telefones que tem no request
        for ($i = 0; $i < count($request->phone); $i++) { //Não gravar o número se não tiver preenchido o campo
            if ($request->phone[$i] == null || $request->phone[$i] == "" || $request->phone[$i] == " ") {
            } else { //Caso tenha preenchido o número, criar o telefone
                Telefone::create([
                    "numero_telefone" => $request->phone[$i],
                    "id_cliente" => $id_cliente->id,
                ]);
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(Telefone $telefone)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit(Telefone $telefone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefone $telefone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefone $telefone)
    {
        //
    }
    public function removerTelefone(Telefone $id_telefone){
        $id_telefone->delete();
        $mensagem = "Número de Telefone Removido com sucesso!";
        return redirect('clientes/'.$id_telefone->id_cliente.'/edit')->with('mensagem',$mensagem);
    }
    public function adicionarNumeros($id_cliente, Request $request){
        
        for ($i = 0; $i < count($request->phone); $i++) { //Não gravar o número se não tiver preenchido o campo
            if ($request->phone[$i] == null || $request->phone[$i] == "" || $request->phone[$i] == " ") {
                $mensagem = "Nenhum telefone Adicionado!";
                return redirect('clientes/'.$id_cliente.'/edit')->with('mensagem',$mensagem);
            } else { //Caso tenha preenchido o número, criar o telefone
                Telefone::create([
                    "numero_telefone" => $request->phone[$i],
                    "id_cliente" => $id_cliente,
                ]);
            }
        }
        $mensagem = "Telefones Adicionados com Sucesso";
        return redirect('clientes/'.$id_cliente.'/edit')->with('mensagem',$mensagem);

    }
}

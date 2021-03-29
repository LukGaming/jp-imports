<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\ImagemProdutoController;
use Illuminate\Support\Facades\Auth;
use App\Models\ImagensProduto;
use App\Models\User;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['usuario_criador_produto'] = Auth::id();
        $produto = Produto::create($request->all());
        $imagens = $request->imagens_produto;
        if (count($imagens) > 0) {
            ImagemProdutoController::adicionarImagens($imagens, $produto->id);
        }
        $mensagem = "Produto Criado com sucesso!";
        return redirect('produto/create')->with(['mensagem'=>$mensagem, 'ultimo_produto_cadastrado' => $produto->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $usuario = User::where('id', $produto->usuario_criador_produto)->first();
        $imagens = Produto::find($produto->id)->ImagensProduto;
        $nome_usuario = $usuario->name;
        $imagens = ImagensProduto::where('id_produto', $produto->id)->get();
        return view('produtos/show', ['produto'=>$produto, 'imagens'=>$imagens, 'criador_produto'=>$nome_usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}

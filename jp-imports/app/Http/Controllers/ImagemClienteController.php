<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImagemClienteController extends Controller
{
    public function storeImage($request)
    {
        $path = 'images/clientes';
        $upload = $request->imagem_cliente->store($path);
        $request->imagem_cliente->move(public_path($path), $upload);
        return $upload;
    }
    public function removerImagem(Cliente $id_cliente)
    {
        //Pegando no banco de dados o caminho da imagem
        $path = $id_cliente->caminho_imagem_cliente; //Caminho da imagem do cliente

        if (file_exists($path)) { //Verificando se arquivo existe
            Storage::delete($path); //Remover Primeiramente do Disco
            unlink($path); //Depois de remover do disco remover da pasta pública
            $id_cliente->update(['caminho_imagem_cliente' => null]); //Atualizando no banco de dados 
            //para a imagem agora ficar NULL
            $mensagem = "Imagem removida com Sucesso!";
            return redirect('clientes/' . $id_cliente->id . '/edit')->with('mensagem', $mensagem);
        }
    }
    public function adicionarImagem(Request $request, Cliente $id_cliente)
    {
        if ($request->imagem_cliente) {
            $path = 'images/clientes'; //Caminho para onde a imagem vai
            $upload = $request->imagem_cliente->store($path); //Salvando no disco
            $request->imagem_cliente->move(public_path($path), $upload); //Movendo para diretório publico
            //Atualizando no banco de dados o caminho da imagem
            $id_cliente->update(['caminho_imagem_cliente' => $upload]);
            $mensagem = "Imagem adicionada com sucesso!";
            return redirect('clientes/' . $id_cliente->id . '/edit')->with('mensagem', $mensagem);
        } else {
            $mensagem = "Nenhuma imagem Selecionada";
            return redirect('clientes/' . $id_cliente->id . '/edit')->with('mensagem', $mensagem);
        }
    }
    public function editarImagem(Request $request, Cliente $id_cliente)
    {
        $path = $id_cliente->caminho_imagem_cliente; //Caminho da imagem do cliente
        //dd($path);
        if (file_exists($path)) { //Verificando se arquivo existe
            Storage::delete($path); //Remover Primeiramente do Disco
            unlink($path); //Depois de remover do disco remover da pasta pública
            $path_imagem = 'images/clientes'; //Caminho para onde a imagem vai
            $upload = $request->imagem_cliente->store($path_imagem); //Salvando no disco
            $request->imagem_cliente->move(public_path($path_imagem), $upload); //Movendo para diretório publico
            //Atualizando no banco de dados o caminho da imagem
            $id_cliente->update(['caminho_imagem_cliente' => $upload]);
            $mensagem = "Imagem editada com Sucesso!";
            return redirect('clientes/' . $id_cliente->id . '/edit')->with('mensagem', $mensagem);
        }
        if ($request->imagem_cliente == null || count($request->imagem_cliente) == 0 || empty($request->imagem_cliente) == 0) {
            $mensagem = "Nenhuma imagem selecionada!";
            return redirect('clientes/' . $id_cliente->id . '/edit')->with('mensagem', $mensagem);
        }
    }
}

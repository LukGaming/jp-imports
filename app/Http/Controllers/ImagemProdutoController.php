<?php

namespace App\Http\Controllers;

use App\Models\ImagensProduto;
use Illuminate\Http\Request;


class ImagemProdutoController extends Controller
{
    static function adicionarImagens($imagens, $id_produto){
        for($i=0; $i<count($imagens); $i++){//Para cada uma das imagens, fazer os procedimentos para salvar           
            $path = 'images/produtos';
            $upload = $imagens[$i]->store($path); //Salvando A imagem no HD
            $imagens[$i]->move(public_path($path), $upload);//Movendo para pasta pública
            ImagensProduto::create([
                'caminho_imagem_produto'=> $upload, 
                'id_produto'=>$id_produto
            ]);//Adicionando no banco de dados
        }
    }
}

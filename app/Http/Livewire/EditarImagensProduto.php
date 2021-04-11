<?php

namespace App\Http\Livewire;

use App\Models\ImagensProduto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;


class EditarImagensProduto extends Component
{
    public $produto;
    public function render()
    {
        return view('livewire.editar-imagens-produto',['imagens_produtos'=>$this->imagensProduto()]);
    }
    public function imagensProduto()
    {
        return ImagensProduto::where('id_produto', $this->produto)->get();
    }
    public function removerImagem($id_imagem, $caminho_imagem)
    {
        ImagensProduto::where('id', $id_imagem)->delete();
        if(file_exists($caminho_imagem)){
            Storage::delete($caminho_imagem);
            unlink($caminho_imagem);
        }
        session()->flash('imagem_removida', 'Mensagem removida com sucesso!');
    }

}

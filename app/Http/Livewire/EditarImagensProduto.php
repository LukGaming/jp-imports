<?php

namespace App\Http\Livewire;

use App\Models\ImagensProduto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\ImagemProdutoController;

class EditarImagensProduto extends Component
{
    use WithFileUploads;
    public $produto;
    public $imagens;
    public function render()
    {
        return view('livewire.editar-imagens-produto', ['imagens_produtos' => $this->imagensProduto()]);
    }
    public function imagensProduto()
    {
        return ImagensProduto::where('id_produto', $this->produto)->get();
    }
    public function removerImagem($id_imagem, $caminho_imagem)
    {
        ImagensProduto::where('id', $id_imagem)->delete();
        if (file_exists($caminho_imagem)) {
            Storage::delete($caminho_imagem);
            unlink($caminho_imagem);
        }
        session()->flash('imagem_removida', 'Mensagem removida com sucesso!');
    }
    public function adicionarImagem()
    {
        if ($this->imagens) {
            foreach ($this->imagens as $imagem) {
                $upload = $imagem->storePublicly('public/product');
                $caminho_imagem = str_replace("public/product/", "", $upload);
                $caminho_imagem = "storage/product/" . $caminho_imagem;
                ImagensProduto::create(['caminho_imagem_produto' => $caminho_imagem, 'id_produto' => $this->produto]);
                
            }
            $this->imagens = null;
            $this->dispatchBrowserEvent('imagens_enviadas');
            //dd($this->imagens);
        } else {
            session()->flash('nenhuma_imagem_selecionada', 'Nenhuma imagem selecionada!');
        }
    }
}

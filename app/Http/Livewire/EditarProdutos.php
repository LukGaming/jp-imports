<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class EditarProdutos extends Component
{
    public $produto;
    public $nome;
    public $descricao;
    public $valor;
    public $horario_compra;
    public function render()
    {
        $this->dataInitial();
        return view('livewire.editar-produtos');
    }
    public function dataInitial()
    {
        $produto =  Produto::where('id', $this->produto)->first();
        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->valor = $produto->valor;
        $this->horario_compra  = $produto->horario_compra;
    }
    public function salvarAlteracoes()
    {
        Produto::where('id', $this->produto)->update(
            [
                'nome'=>$this->nome,
                'descricao'=>$this->descricao,
                'valor'=>$this->valor,
                'horario_compra'=>$this->horario_compra
            ]);
            session()->flash('produto_editado', 'Produto editado com sucesso!');
    }
}

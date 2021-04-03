<?php

namespace App\Http\Livewire;

use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use App\Models\NotasClientes;
use Illuminate\Support\Facades\DB;

class ClientComments extends Component
{
    public $notas_anteriores;
    public $nota_cliente = "";
    public $cliente;
    public $id_usuario;
    public function render()
    {
        $this->mostrandoNotas();
        return view('livewire.client-comments');
    }
    public function adicionarNota()
    {
        NotasClientes::create(['body' => $this->nota_cliente, 'id_cliente' => $this->cliente, 'id_usuario' => $this->id_usuario]);
        $this->nota_cliente = "";
        session()->flash('nota_adicionada', 'Nota adicionada com sucesso!');
    }
    public function submit()
    {
        if ($this->nota_cliente == "") {
            session()->flash('nota_vazia', 'Preencha o campo para adicionar a nota');
            return;
        } else {
            $this->adicionarNota();
            $this->mostrandoNotas();
        }
    }
    public function mostrandoNotas()
    {
        $this->notas_anteriores = DB::table('notas_clientes')->where('id_cliente', $this->cliente)->get();
        for ($i = 0; $i < count($this->notas_anteriores); $i++) {
            $nome_usuario = DB::table('users')->where('id', $this->notas_anteriores[$i]->id_usuario)->first();
            $this->notas_anteriores[$i]->created_by = $nome_usuario->name;
        }
    }
    public function removerNota($id_nota){
        $nome_usuario = DB::table('notas_clientes')->where('id', $id_nota)->delete();
        session()->flash('nota_removida', 'Nota removida com sucesso!');
    }
}

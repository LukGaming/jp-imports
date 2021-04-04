<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class SearchClientes extends Component
{
    public $search;
    public $clientesThatCameFromSearch;
    public $count = 2;
    public function render()
    {
        if ($this->search) {
            $this->searchClientes();
        }
        return view('livewire.search-clientes');
    }
    public function searchClientes()
    {
        $clientes = DB::table('clientes')
            ->where('nome', 'like', '%' . $this->search . '%')
            ->get();
        if (count($clientes) > 0) {
            $this->clientesThatCameFromSearch = $clientes;
            $this->count = 1;
        } else {
            $this->count = 0;
            $this->clientesThatCameFromSearch = null;
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Illuminate\Cache\Console\ClearCommand;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClientes extends Component
{
    public $search;
    public $clientesThatCameFromSearch;
    public $count = 2;

    public function render()
    {
        $query = $this->searchClientes();
        return view('livewire.search-clientes', ['initialClientes' => $query]);
    }
    public function searchClientes()
    {
        if ($this->search == "") {
            return Cliente::all();
        } else {
            return  DB::table('clientes')
                ->where('nome', 'like', '%' . $this->search . '%')
                ->get();
        }
    }
}

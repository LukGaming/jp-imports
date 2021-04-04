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
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $query = $this->searchClientes();
        return view('livewire.search-clientes', ['initialClientes' => $query]);
    }
    public function searchClientes()
    {
        if ($this->search == "") {
            return Cliente::paginate(12);
        } else {
            return  DB::table('clientes')
                ->where('nome', 'like', '%' . $this->search . '%')
                ->paginate(12);
        }
    }
}

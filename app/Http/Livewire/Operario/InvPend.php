<?php

namespace App\Http\Livewire\Operario;

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class InvPend extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $search, $inventory;
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
        $inventories = Inventory::search($this->search)
            ->where("user_id",Auth::id())
            ->where("status","!=","done")
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->Paginate($this->perPage);
        return view('livewire.operario.inv-pend', compact("inventories"));
    }
}

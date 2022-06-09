<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory;
use Livewire\Component;

class Inventory extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $listeners = ['render', 'delete'];
    public function render()

    public function delete(Inventory $inventory){
        $inventory->delete();
    }
    
    public function render()
    {
        $inventories = Inventory::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage);
        return view('livewire.admin.inventory');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory as ModelsInventory;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    /* SEARCH INVENTARIES */
    use WithPagination;
    public $perPage = 10;
    public $search, $inventory;
    public $orderBy = 'id';
    public $orderAsc = true;
    protected $listeners = ['render', 'delete'];

    /* EDITING */
    public $open_edit = false;

    public function delete(ModelsInventory $inventory)
    {
        $inventory->delete();
    }


    public function render()
    {
        $inventories = ModelsInventory::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->Paginate($this->perPage);
        return view('livewire.admin.inventory', compact('inventories'));
    }


    public function showInventory(ModelsInventory $inventory)
    {
        return view('livewire.admin.product-import', compact('inventory'));
    }
}

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
    protected $rules = [
        'inventory.code' => 'required|max:100',
        'inventory.ubication' => 'required|max:100',
        'inventory.barcode' => 'required|max:100',
        'inventory.status' => 'required|max:100',
    ];

    public function delete(ModelsInventory $inventory)
    {
        $inventory->delete();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $inventories = ModelsInventory::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->Paginate($this->perPage);
        return view('livewire.admin.inventory', compact('inventories'));
    }

    public function editInventory(ModelsInventory $inventory)
    {
        $this->inventory = $inventory;
        $this->open_edit = true;
    }

    public function updateInventory(ModelsInventory $inventory)
    {
        $this->validate();
        $this->inventory->save();
        $this->reset('open_edit');
        $this->emit('render');
        $this->emit('edit');
    }

    public function showInventory(ModelsInventory $inventory)
    {
        return view('livewire.admin.product-import', compact('inventory'));
    }
}

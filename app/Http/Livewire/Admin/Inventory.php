<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory as ModelsInventory;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    protected $listeners = ['render', 'delete'];

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
            ->simplePaginate($this->perPage);
        return view('livewire.admin.inventory', compact('inventories'));
    }
}

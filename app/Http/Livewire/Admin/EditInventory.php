<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory;
use Livewire\Component;

class EditInventory extends Component
{

    public $open = false;
    public $inventory;

    protected $rules = [
        'inventory.code' => 'required|max:100',
        'inventory.ubication' => 'required|max:100',
        'inventory.barcode' => 'required|max:100',
        'inventory.status' => 'required|max:100',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function save()
    {
        $this->validate();
        $this->inventory->save();
        $this->reset('open');
        $this->emit('render');
        $this->emit('edit');
    }

    public function render()
    {
        return view('livewire.admin.edit-inventory');
    }
}

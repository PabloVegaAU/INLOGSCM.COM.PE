<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory;
use Livewire\Component;

class AddInventory extends Component
{
    public $open = false;

    public $code, $ubication, $barcode, $status;

    protected $rules = [
        'code' => 'required|unique:inventories|max:100',
        'ubication' => 'required|unique:inventories|max:100',
        'barcode' => 'required|unique:inventories|max:100',
        'status' => 'required|unique:inventories|max:100',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        Inventory::create([
            'code' => $this->code,
            'ubication' => $this->ubication,
            'barcode' => $this->barcode,
            'status' => $this->status,
        ]);

        $this->reset('open', 'code', 'ubication', 'barcode', 'status');
        $this->emit('render');
        $this->emit('add');
    }

    public function render()
    {
        return view('livewire.admin.add-inventory');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory;
use App\Models\User;
use Livewire\Component;

class AddInventory extends Component
{
    public $open = false;

    public $name, $user_id;

    protected $rules = [
        'name' => 'required|unique:inventories|max:100',
        'user_id' => 'required|max:100',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingOpen()
    {
        if ($this->open === false) {
            $this->reset(['open', 'name', 'user_id']);
        }
    }

    public function save()
    {
        $this->validate();
        Inventory::create([
            'name' => $this->name,
            'user_id' => $this->user_id,
            /* 'code' => $this->code,
            'ubication' => $this->ubication,
            'barcode' => $this->barcode,
            'status' => $this->status, */
        ]);

        $this->reset('open', 'name', 'user_id');
        $this->emit('render');
        $this->emit('add');
    }

    public function render()
    {
        $users = User::where('type', 'operario')->get();
        return view('livewire.admin.add-inventory', compact('users'));
    }
}

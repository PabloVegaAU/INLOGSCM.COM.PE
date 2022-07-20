<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory;
use App\Models\User;
use Livewire\Component;

class EditInventory extends Component
{

    public $open = false;
    public $inventory, $operator;
    public $name, $user_id;
    protected $rules = [
        'inventory.name' => 'required|max:100|unique:inventories,id',
        'inventory.user_id' => 'required|max:100',
        'inventory.status' => 'required|max:100'
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
        $this->reset('open', 'name', 'user_id');
        $this->emit('render');
        $this->emit('edit');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.edit-inventory', compact('users'));
    }
}

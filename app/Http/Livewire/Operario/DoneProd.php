<?php

namespace App\Http\Livewire\Operario;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class DoneProd extends Component
{
    use WithPagination;
    public $inventory;

    public function render()
    {
        $products = Product::where('inventory_id', $this->inventory->id)->paginate(10);
        return view('livewire.operario.done-prod', compact('products'));
    }
}

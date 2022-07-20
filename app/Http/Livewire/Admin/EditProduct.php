<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{

    public $open= false;
    public $product;
    protected $rules = [
        'product.ubication' => 'required|max:100|',
        'product.barcode' => 'required|max:100',
        'product.code' => 'required',
        'product.description' => 'required',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $this->validate();
        $this->product->save();
        $this->reset('open');
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.admin.edit-product');
    }
}

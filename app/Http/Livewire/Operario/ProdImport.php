<?php

namespace App\Http\Livewire\Operario;

use App\Models\Inventory;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProdImport extends Component
{
    use WithPagination;
    public $inventory;
    public $barcode;
    protected $messages =[
        "barcode.required" => "Ingrese un codigo de barras para verificación de stock",
        "barcode.exists" => "El codigo de barra ingresado no existe"
    ];


    public function check()
    {
        $validate = $this->validate([
            "barcode" => "required|exists:products"
        ]);

        $item = Product::where("barcode",$this->barcode)->first();
            $count = $item->checked + 1;
            $stock = intval($item->stock);
            if($count > $stock){
                $this->addError('barcode','El stock esta completo, por favor use otro codigo');
                $this->reset("barcode");
            }else{
                $item->update(["checked" => $count]);
                $this->reset("barcode");
            }

    }

    public function finish_inventory($id){

        $item = Inventory::where("id", $id)->first();
        foreach ($item->products as $producto) {
            if(intval($producto->stock) != $producto->checked){
                $error = $this->addError("inv", "No ha terminado de verificar stock, intentelo cuando finalize");
            }
        }
        if(!isset($error) ){
           $item->update(["status" => "done"]);
        }
    }

    public function stock_reset($id){
        $item = Product::where("id",$id)->first();
        $item->update(["checked" => 0]);
    }

    public function render()
    {

        // $products = Product::where('inventory_id', $this->inventory->id)->paginate(10);
        $products = Product::where('inventory_id', $this->inventory->id)->paginate(10);
        return view('livewire.operario.prod-import', compact("products"));
    }



}

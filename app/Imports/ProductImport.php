<?php

namespace App\Imports;

use App\Models\Inventory;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    public function model(array $row)
    {
        if (Inventory::where('name', $row[0])->get()->first() !== null) {
            $inventory_id = Inventory::where('name', $row[0])->get()->first()->id;
            if ($inventory_id && $row[1] !== null && $row[2] !== null && $row[3] !== null && $row[4] !== null && $row[5] !== null) {
                return new Product([
                    'inventory_id' =>  $inventory_id,
                    'ubication' => $row[1],
                    'barcode' => $row[2],
                    'code' => $row[3],
                    'description' => $row[4],
                    'stock' => $row[5]
                ]);
            }
        }
    }
}

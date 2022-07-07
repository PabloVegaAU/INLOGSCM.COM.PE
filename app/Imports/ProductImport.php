<?php

namespace App\Imports;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel
{
    
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $inventory =  Inventory::create([
            'name' => 'Inv.25052022_001',
            'user_id' => 1
        ]);
        return new Product([
            'inventory_id' => $inventory->id,
            'ubication' => $row[2],
            'barcode' => $row[3],
            'code' => $row[4],
            'description' => $row[5],
            'stock' => $row[6]
        ]);
    }
}

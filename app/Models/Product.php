<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id', 'ubication', 'barcode', 'code', 'description', 'stock', 'checked'
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%');
    }
}

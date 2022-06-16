<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code', 'ubication', 'barcode', 'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('code', 'like', '%' . $search . '%');
    }
}

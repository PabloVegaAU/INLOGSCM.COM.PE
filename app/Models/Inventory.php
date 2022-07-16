<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('status', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhereHas('User', function(Builder $query) use ($search){
                $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('realname', 'like', '%' . $search . '%')
                        ->orWhere('realsurname', 'like', '%' . $search . '%');
            });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'description',
        'cost',
        'stock'
    ];

    // Query Scopes

    public function scopeId($query, $id) {
        if ($id)
            return $query->orwhere('id', 'LIKE', "%$id%");
    }

    public function scopeDescription($query, $description) {
        if ($description)
            return $query->orwhere('description', 'LIKE', "%$description%");
    }

    public function scopeCost($query, $cost) {
        if ($cost)
            return $query->orwhere('cost', 'LIKE', "%$cost%");
    }

    public function scopeStock($query, $stock) {
        if ($stock)
            return $query->orwhere('stock', 'LIKE', "%$stock%");
    }
}

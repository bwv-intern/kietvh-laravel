<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'id_category',
        'description',
        'quantity',
    ];

    protected $casts = [
        'price' => 'float',
        'id_category' => 'integer',
        'quantity' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}

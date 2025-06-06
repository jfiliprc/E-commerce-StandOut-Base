<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = ['product_id', 'color', 'color_hash', 'size', 'sku', 'price', 'stock'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


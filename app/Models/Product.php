<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'is_active'];
    protected $appends = ['primary_image', 'primary_variant_price'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Accessor para imagem primária
    public function getPrimaryImageAttribute()
    {
        return $this->images->where('is_primary', true)->first() ?? $this->images->first();
    }

    // Accessor para preço da variante primária
    public function getPrimaryVariantPriceAttribute()
    {
        return $this->variants->sortBy('price')->first()->price ?? 0;
    }
}


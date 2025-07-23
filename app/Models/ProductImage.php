<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'url',
        'alt_text',
        'sort_order',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    // Relationship with product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scope for primary images
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }
}

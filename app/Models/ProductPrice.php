<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_price';

    protected $fillable = [
        'product_id',
        'unit_id',
        'price',
        'status_id',
        'created_user',
        'updated_user',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Define relationships
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Accessor for product name
    public function getProductNameAttribute()
    {
        return $this->product ? $this->product->name : null;
    }

    // Ensure relationships are hidden in JSON response
    protected $hidden = ['product'];
}

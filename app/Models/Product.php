<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'status_id', 'category_id','created_user', 'updated_user'
    ];

    protected $appends = ['status', 'category', 'unit', 'price'];

    // Define relationships
    public function statusRelation()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function unitRelation()
    {
        return $this->belongsTo(UnitOfMeasure::class, 'unit_id');
    }

    public function priceRelation()
    {
        return $this->hasOne(ProductPrice::class, 'product_id')->latest();
    }

    // Accessors for status name
    public function getStatusAttribute()
    {
        return $this->statusRelation ? $this->statusRelation->name : null;
    }

    // Accessors for category name
    public function getCategoryAttribute()
    {
        return $this->categoryRelation ? $this->categoryRelation->name : null;
    }

    public function getUnitAttribute()
    {
        return $this->unitRelation ? $this->unitRelation->name : null;
    }

    public function getPriceAttribute()
    {
        return $this->priceRelation ? $this->priceRelation->price : null;
    }

    // Ensure status_id and category_id are hidden
    protected $hidden = ['statusRelation', 'categoryRelation', 'unitRelation', 'priceRelation'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'status_id', 'category_id',
        'created_date', 'updated_date', 'created_user', 'updated_user'
    ];

    protected $appends = ['status', 'category'];

    // Define relationships
    public function statusRelation()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
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

    // Ensure status_id and category_id are included in the response
    protected $hidden = ['statusRelation', 'categoryRelation'];
}

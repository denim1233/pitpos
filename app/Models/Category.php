<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'status_id', 'created_date', 'updated_date', 'created_user', 'updated_user'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}


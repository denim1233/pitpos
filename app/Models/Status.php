<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $fillable = ['name', 'created_date', 'updated_date', 'created_user', 'updated_user'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'status_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'status_id');
    }

    public function unitsOfMeasure()
    {
        return $this->hasMany(UnitOfMeasure::class, 'status_id');
    }
}


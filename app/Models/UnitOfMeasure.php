<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOfMeasure extends Model
{
    use HasFactory;

    protected $table = 'unit_of_measures';
    protected $fillable = ['name', 'status_id', 'price', 'set_as_default', 'created_date', 'updated_date', 'created_user', 'updated_user'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    
}
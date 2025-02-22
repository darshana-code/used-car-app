<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'manufacturer_id', 'model', 'year', 'color'];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}

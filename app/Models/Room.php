<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use SoftDeletes,HasFactory; // Aktifkan soft delete
    protected $fillable = [
        'name', 'type', 'daily_price','monthly_price','yearly_price', 'image_path', 'simple_description', 'description'
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
    protected function getImagePathAttribute($value)
    {
        $path = asset('storage/' . $value);
        return $path;
    }
}

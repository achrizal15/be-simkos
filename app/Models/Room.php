<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use SoftDeletes; // Aktifkan soft delete

    protected $fillable = ['name'];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}

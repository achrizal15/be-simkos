<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;
    protected $table = 'features'; // Nama tabel dalam bahasa Inggris
    protected $fillable = ['name','icon']; // Kolom yang bisa diisi
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
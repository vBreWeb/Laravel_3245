<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = [
        'name',
        'slug',
    ];

    // Relasi ke tabel events
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

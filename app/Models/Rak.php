<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}

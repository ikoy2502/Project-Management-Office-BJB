<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsalProjek extends Model
{
    public function projek()
    {
        return $this->hasMany(Projek::class, 'asal_projek_id');
    }
}

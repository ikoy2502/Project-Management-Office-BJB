<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projek extends Model
{
    public function asalProjek()
    {
        return $this->belongsTo(AsalProjek::class, 'asal_project_id');
    }
}

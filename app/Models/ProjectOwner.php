<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOwner extends Model
{

    protected $fillable = [
        'divisi', 'group', 'subgroup'
    ];

        public function owner()
    {
         return $this->belongsTo(ProjectOwner::class, 'project_owner');
    }

    
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;

    protected $table = 'progress'; // Ganti dengan nama tabel yang sesuai

    protected $fillable = [
        'project_id',
        'activity',
        'status',
        'created_at',
        'updated_at',
    ];

    // Relasi dengan model Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'task_list';

    protected $fillable = ['project_id', 'task', 'deskripsi', 'status'];

    // Definisikan relasi dengan model Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
}


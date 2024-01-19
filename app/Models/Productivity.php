<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productivity extends Model
{
    use HasFactory;
    protected $table = 'productivity'; // Nama tabel yang digunakan

    protected $fillable = [
        'project_id',
        'task_id',
        'comment',
        'subject',
        'date',
        'start',
        'end_time',
        'user_id',
        'time_rendered',
    ];

    public function user()

    {

        return $this->belongsTo(User::class, 'user_id');

    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}

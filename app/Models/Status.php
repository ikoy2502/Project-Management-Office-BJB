<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = [
        'nama',
        // Tambahkan atribut lain yang ingin Anda izinkan untuk diisi secara massal
    ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    use HasFactory;
    protected $table = 'projects'; // Gantilah 'nama_tabel_anda' sesuai dengan nama tabel yang sesuai di database Anda

    protected $fillable = ['triwulan']; // Kolom yang dapat diisi secara massal

    // ...
}

    


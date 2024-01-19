<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Revision;


class Revisions extends Model
{
    protected $fillable = [
        'name',
        // Tambahkan atribut lain yang ingin Anda izinkan untuk diisi secara massal
    ];
}

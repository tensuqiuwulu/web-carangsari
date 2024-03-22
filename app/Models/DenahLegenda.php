<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenahLegenda extends Model
{
    use HasFactory;

    protected $table = 'denah_legenda';

    protected $fillable = [
        'id_denah', // tambahkan field id_denah
        'judul',
        'deskripsi',
    ];
}

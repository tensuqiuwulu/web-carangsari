<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeninggalanKuno extends Model
{
    use HasFactory;

    protected $table = 'peninggalan_kuno';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denah extends Model
{
    use HasFactory;

    protected $table = 'denah';

    protected $fillable = [
        'judul',
        'foto'
    ];

    public function legenda()
    {
        return $this->hasMany(DenahLegenda::class, 'id_denah');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'poli';

    protected $fillable = [
        'nama_poli', 'lantai'
    ];

    public function dokter()
    {
        return $this->hasMany(Dokter::class);
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }

    protected $guarded = [];
}

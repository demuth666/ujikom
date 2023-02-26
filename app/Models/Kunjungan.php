<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    
    protected $table = 'kunjungan';

    protected $fillable = [
        'tgl_kunjungan', 'pasien_id', 'poli_id', 'jam_kunjungan'
    ];

    protected $guarded = [];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

     public function poli()
     {
        return $this->belongsTo(Poli::class);
     }
}

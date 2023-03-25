<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanRekam extends Model
{
    use HasFactory;

    protected $table = 'catatan_rekam_medis';

    protected $fillable = [
        'tindakan', 'dokter', 'diagnosa', 'pasien_id',
        'keluhan', 'kode_resep', 'tgl_pemeriksaan'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}

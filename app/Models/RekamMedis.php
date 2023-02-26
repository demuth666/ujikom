<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';

    protected $fillable = [
        'rm_id', 'tindakan_id', 'obat_id', 'user_id', 'pasien_id', 'diagnosa', 'resep',
        'keluhan', 'tgl_pemeriksaan', 'ket'
    ];

    protected $guarded = [];

    public function lab()
    {
        $this->belongsTo(Lab::class);
    }
}

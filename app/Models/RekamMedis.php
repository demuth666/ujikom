<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rekam_medis';

    protected $fillable = [
        'pasien_id', 'tindakan_id', 'obat', 'dokter', 'pasiens', 'diagnosa', 'resep',
        'keluhan', 'tgl_pemeriksaan',
    ];

    protected $guarded = [];

    public function labotarium()
    {
       return $this->belongsTo(Lab::class);
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }
    
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}

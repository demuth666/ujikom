<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dokter';

    protected $fillable = [
        'poli_id', 'tgl_kunjungan', 'user_id', 'nama_dokter', 'sip', 'tempat_lahir', 'no_tlp',
        'alamat'
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

    protected $guarded = [];
}

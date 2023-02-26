<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'poli_id', 'tgl_kunjungan', 'kd_user', 'nama_dokter', 'sip', 'tempat_lahir', 'no_tlp',
        'alamat'
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    protected $guarded = [];
}

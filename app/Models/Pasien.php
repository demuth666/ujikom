<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pasien';

    protected $fillable = [
        'nama_pasien', 'j_kelamin', 'agama', 'alamat' ,'tgl_lahir',
        'usia', 'no_tlp', 'nm_kk', 'hub_kel'
    ];

    protected $guarded = [];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class);
    }
}

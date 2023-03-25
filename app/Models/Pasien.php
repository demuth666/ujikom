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
    
    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->no_rm = 'RM' . date('Ymd') . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
        });

        static::updating(function ($model) {
            if ($model->isDirty('nama') || $model->isDirty('tanggal_lahir')) {
                $model->no_rm = 'RM' . date('Ymd') . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function catatanrekam()
    {
        return $this->hasMany(CatatanRekam::class);
    }
}

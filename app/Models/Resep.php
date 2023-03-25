<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep_obat';

    protected $fillable = [
        'pasien_id', 'pasiens', 'obat', 'kode_resep', 'diagnosa'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastKodeResep = static::where('pasien_id', $model->pasien_id)
            ->where('diagnosa', $model->diagnosa)
            ->latest('created_at')->first();

            if ($lastKodeResep) {
                $model->kode_resep = $lastKodeResep->kode_resep;
                CatatanRekam::where('diagnosa', $model->diagnosa)->update(['kode_resep' => $lastKodeResep->kode_resep]);
            } else {
                $model->kode_resep = 'RSP' . date('Ymd') . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);

            }
        }); 

        static::updating(function ($model) {
            CatatanRekam::where('diagnosa', $model->diagnosa)->update(['kode_resep' => $model->kode_resep]);
        });
    }

    public static function findByKodeResep($kode_resep)
    {
        return static::where('kode_resep', $kode_resep)->get();
    }
}

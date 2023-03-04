<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'labotarium';

    protected $fillable = [
        'no_rm', 'hasil_lab', 'ket'
    ];

    protected $guarded = [];

    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::class);
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
}

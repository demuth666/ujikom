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

    public function setNoRmAttribute($value)
    {
        $date = date('Ymd');
        $latestPatient = self::where('no_rm', 'like', 'RM' . $date . '%')->latest()->first();
        $latestNoRm = $latestPatient ? substr($latestPatient->no_rm, -3) : 0;
        $newNoRm = str_pad($latestNoRm + 1, 3, '0', STR_PAD_LEFT);
        $this->attributes['no_rm'] = 'RM' . $date . $newNoRm;
    }
}

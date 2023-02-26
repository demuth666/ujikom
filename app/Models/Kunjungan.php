<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kunjungan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = false; 

    protected $keyType = 'string';
    
    protected $guarded = [];
    
    protected static function boot()
    {   
        parent::boot();

        static::creating(function($model){
            if($model->getKey() == null){
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    protected $table = 'kunjungan';

    protected $fillable = [
        'tgl_kunjungan', 'pasien_id', 'poli_id', 'jam_kunjungan'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

     public function poli()
     {
        return $this->belongsTo(Poli::class);
     }
}

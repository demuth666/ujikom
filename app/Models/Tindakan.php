<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tindakan extends Model
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

    protected $table = 'tindakan';

    protected $fillable = [
         'nm_tindakan', 'ket'
    ];

}

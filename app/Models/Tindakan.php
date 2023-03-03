<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tindakan extends Model
{
    use HasFactory, HasUuids;
    
    protected $guarded = [];
    
    protected $table = 'tindakan';

    protected $fillable = [
         'nm_tindakan', 'ket'
    ];

    public function RekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

}

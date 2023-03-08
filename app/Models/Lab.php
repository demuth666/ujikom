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

    
}

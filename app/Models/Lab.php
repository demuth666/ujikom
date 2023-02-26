<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $table = 'labotarium';

    protected $fillable = [
        'no_rm', 'hasil_lab', 'ket'
    ];

    protected $guarded = [];

    public function pasien()
    {
        
    }
}

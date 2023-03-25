<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'obat';

    protected $fillable = [
        'nama_obat', 'jml_obat', 'ukuran', 'harga'
    ];

    protected $guarded = [];

    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
    
    public function resep()
    {
        return $this->hasMany(Resep::class);
    }
}

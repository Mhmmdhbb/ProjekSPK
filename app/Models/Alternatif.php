<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatifs';

    protected $fillable = [
        'kode_alternatif',
        'nama_alternatif'
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function hasilMaut()
    {
        return $this->hasOne(HasilMaut::class);
    }
}
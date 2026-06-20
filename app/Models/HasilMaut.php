<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilMaut extends Model
{
    use HasFactory;

    protected $table = 'hasil_mauts';

    protected $fillable = [
        'user_id',
        'alternatif_id',
        'nilai_akhir',
        'ranking'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = [
        'siswa_id',
        'pilihan_id',
    ];

    public function pilihan()
    {
        return $this->belongsTo('App\Pilihan', 'id');
    }

    public function soal()
    {
        return $this->belongsTo('App\Soal', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id');
    }
}

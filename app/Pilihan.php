<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilihan extends Model
{
    protected $fillable = [
        'soal_id',
        'deskripsi',
        'benar',
    ];

    public function soal()
    {
        return $this->belongsTo('App\Soal', 'soal_id');
    }

    public function jawaban()
    {
        return $this->hasMany('App\Jawaban', 'pilihan_id');
    }
}

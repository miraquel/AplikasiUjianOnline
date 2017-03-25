<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [
        'id',
        'ujian_id',
        'deskripsi',
    ];

    public function ujians()
    {
        return $this->belongsTo('App\Ujian', 'ujian_id');
    }

    public function pilihans()
    {
        return $this->hasMany('App\Pilihan', 'soal_id');
    }

    public function jawabans()
    {
        return $this->hasManyThrough('App\Jawaban', 'App\Pilihan');
    }
}

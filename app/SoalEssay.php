<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalEssay extends Model
{
    protected $fillable = [
        'ujian_id',
        'deskripsi',
    ];

    public function ujian()
    {
        return $this->belongsTo('App\Ujian', 'ujian_id');
    }

    public function siswas()
    {
        return $this->belongsToMany('App\Siswa', 'soal_essay_siswa')->withTimestamps();
    }

}

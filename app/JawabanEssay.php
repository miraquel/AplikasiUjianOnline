<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanEssay extends Model
{
    protected $fillable = [
        'siswa_id',
        'soal_essay_id',
        'jawaban',
    ];

    public function soal_essay()
    {
        return $this->belongsTo('App\SoalEssay', 'soal_essay_id');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'siswa_id');
    }

}

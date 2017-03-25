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

    public function jawaban_essay()
    {
        return $this->hasMany('App\JawabanEssay', 'id');
    }

}

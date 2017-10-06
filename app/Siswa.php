<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    protected $fillable = [
        'kejuruan_id',
        'agama_id',
        'pendidikan_id',
        'pekerjaan_id',
        'status_id',
        'informasi_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'user_id',
    ];

    // protected $appends = ['nilai_pilihan_ganda', 'nilai_essay'];
    //
    // public function getNilaiPilihanGandaAttribute()
    // {
    //     if ($this->attributes['nilai_pilihan_ganda'] = null) {
    //       return $this->attributes['nilai_pilihan_ganda'] = null;
    //     }
    //     return $this->attributes['nilai_pilihan_ganda'];
    // }
    //
    // public function setNilaiPilihanGandaAttribute($value)
    // {
    //     return $this->attributes['nilai_pilihan_ganda'] = $value;
    // }
    //
    // public function getNilaiEssayAttribute()
    // {
    //     if ($this->attributes['nilai_essay'] = null) {
    //         return $this->attributes['nilai_essay'] = null;
    //     }
    //     return $this->attributes['nilai_essay'];
    // }
    //
    // public function setNilaiEssayAttribute($value)
    // {
    //     return $this->attributes['nilai_essay'] = $value;
    // }

    //One to Many Relationship with agama's table
    public function agamas()
    {
        return $this->belongsTo('App\Agama', 'agama_id');
    }

    //One to Many Relationship with Informasi's table
    public function informasis()
    {
        return $this->belongsTo('App\Informasi', 'informasi_id');
    }

    //One to Many Relationship with Kejuruan's table
    public function kejuruans()
    {
        return $this->belongsTo('App\Kejuruan', 'kejuruan_id');
    }

    //One to Many Relationship with Pendidikan's table
    public function pendidikans()
    {
        return $this->belongsTo('App\Pendidikan', 'pendidikan_id');
    }

    //One to Many Relationship with Statuse's table
    public function statuses()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function pekerjaans()
    {
        return $this->belongsTo('App\Pekerjaan', 'pekerjaan_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pilihans()
    {
        return $this->belongsToMany('App\Pilihan')->withTimestamps();
    }

    public function ujians()
    {
        return $this->belongsToMany('App\Ujian', 'ujian_siswa')->withTimestamps();
    }

    public function soalEssays()
    {
        return $this->belongsToMany('App\SoalEssay', 'soal_essay_siswa')->withPivot('jawaban')->withPivot('nilai')->withTimestamps();
    }
}

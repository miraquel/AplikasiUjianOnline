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
    ];

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
}

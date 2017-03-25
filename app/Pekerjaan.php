<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $fillable = [
        'deskripsi'
    ];

    //One to Many Relationship with Siswa's Table
    public function siswa()
    {
        return $this->hasMany('App\Siswa');
    }
}

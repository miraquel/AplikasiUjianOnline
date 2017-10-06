<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
  protected $fillable = [
      'kejuruan_id',
      'deskripsi',
      'tanggal_mulai',
      'tanggal_selesai',
      'durasi',
  ];

  //One to Many Relationship with Siswa's Table
  public function kejuruans()
  {
      return $this->belongsTo('App\Kejuruan', 'kejuruan_id');
  }

  public function soals()
  {
      return $this->hasMany('App\Soal', 'id');
  }

  public function soal_essays()
  {
      return $this->hasMany('App\SoalEssay', 'id');
  }

}

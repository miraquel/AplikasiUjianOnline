<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
  protected $fillable = [
      'deskripsi'
  ];

  //One to Many Relationship with Siswa's Table
  public function siswas()
  {
      return $this->hasMany('App\Siswa', 'kejuruan_id');
  }

  public function ujians()
  {
      return $this->hasMany('App\Ujian', 'id');
  }
}

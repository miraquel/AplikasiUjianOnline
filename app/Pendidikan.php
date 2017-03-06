<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
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

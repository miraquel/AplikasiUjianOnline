<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
  protected $fillable = [
      'deskripsi'
  ];

  //One to Many Relationship with Siswa's Table
  public function siswa()
  {
      return $this->hasMany('App\Siswa', 'kejuruan_id');
  }
}

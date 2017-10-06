<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Ujian;
use App\Pilihan;
use App\SoalEssay;
use App\Soal;

class AppsController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $ujians = Ujian::all();
        return view('apps.ujian', compact('siswas','ujians'));
    }

    public function selesai($ujian_id, $siswa_id)
    {
      $soals = Soal::all()->where('ujian_id', $ujian_id);
      $pilihans = Pilihan::all()->whereIn('soal_id', $soals->pluck('id')->toArray());
      $soalEssays = SoalEssay::all()->where('ujian_id', $ujian_id);
      $ujian = Ujian::findOrFail($ujian_id);
      $siswas = Siswa::findOrFail($siswa_id);

      $benarPG = $siswas->pilihans->whereIn('pivot.pilihan_id', $pilihans->pluck('id'))->where('benar', 1)->count();
      if ($soals->count() > 0) {
        $nilaiPG = ($benarPG / $soals->count()) * 100;
      }
      else {
        $nilaiPG = 0;
      }
      $siswas->nilai_pilihan_ganda = $nilaiPG;

      $benarEssay = $siswas->soalEssays->where('ujian_id', $ujian_id)->pluck('pivot.nilai')->sum();
      if ($soalEssays->count() > 0) {
        $nilaiEssay = $benarEssay / $soalEssays->count();
      }
      else {
        $nilaiEssay = 0;
      }
      $siswas->nilai_essay = $nilaiEssay;

      $siswas->nilai_akhir = ($nilaiPG * 60/100) + ($nilaiEssay * 40/100);

      return view('apps.selesai', compact('siswas', 'soals', 'pilihans', 'soalEssays', 'ujian'));

    }
}

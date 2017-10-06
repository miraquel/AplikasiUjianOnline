<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App;
use App\Siswa;
use App\Soal;
use App\SoalEssay;
use App\Pilihan;
use App\Ujian;
use Carbon\Carbon;

class PrintController extends Controller
{
    public function print($id)
    {
        $soals = Soal::all()->where('ujian_id', $id);
        $pilihans = Pilihan::all()->whereIn('soal_id', $soals->pluck('id')->toArray());
        $soalEssays = SoalEssay::all()->where('ujian_id', $id);
        $siswas = Siswa::all();
        $ujian = Ujian::findOrFail($id);
        $ujian->durasi = $ujian->durasi / 1000;

        foreach ($siswas as $key => $siswa) {
          $benarPG = $siswa->pilihans->whereIn('pivot.pilihan_id', $pilihans->pluck('id'))->where('benar', 1)->count();
          $nilaiPG = ($benarPG / $soals->count()) * 100;
          $siswa->nilai_pilihan_ganda = $nilaiPG;

          $benarEssay = $siswa->soalEssays->where('ujian_id', $id)->pluck('pivot.nilai')->sum();
          $nilaiEssay = $benarEssay / $soalEssays->count();
          $siswa->nilai_essay = $nilaiEssay;

          $siswa->nilai_akhir = ($nilaiPG * 60/100) + ($nilaiEssay * 40/100);
        }
        // return $siswas;
        // return view('')

        $pdf = PDF::loadView('pdf.nilai', [
          'siswas' => $siswas,
          'soals' => $soals,
          'ujian' => $ujian,
          'pilihans' => $pilihans
         ]);
        return $pdf->inline('daftar_nilai_.pdf');
        // $pdf = App::make('snappy.pdf.wrapper');
        // $pdf->loadHTML("https://www.google.com");
        // return $pdf->inline();
        // return PDF::loadFile('http://www.github.com')->inline('github.pdf');
    }
}

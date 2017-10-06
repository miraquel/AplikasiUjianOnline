
<?php

namespace App\Http\Controllers;

use App\Ujian;
use App\Kejuruan;
use App\Soal;
use App\SoalEssay;
use App\Siswa;
use App\Pilihan;
use Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UjianController extends Controller
{
  public function __construct()
  {
      //
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $ujians = Ujian::all()->sortByDesc('id');
      $kejuruans = Kejuruan::all();
      return view('manajemen_soal.ujian.index', compact('ujians', 'kejuruans'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $kejuruans = Kejuruan::all();
      return view('manajemen_soal.ujian.create', compact('kejuruans'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      Ujian::create($request->all());
      return redirect('/ujian');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $ujians = Ujian::findOrFail($id);
      $soals = Soal::all()->where('ujian_id', $ujians->id);
      $pilihans = Pilihan::all();
      return view('manajemen_soal.ujian.show', compact('ujians','soals','pilihans'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $ujians = Ujian::findOrFail($id);
      $kejuruans = Kejuruan::all();
      // return $ujians;
      return view('manajemen_soal.ujian.edit', compact('ujians','kejuruans'));
  }

  public function editSoal($id)
  {
      $ujians = Ujian::findOrFail($id);
      $soals = Soal::all();
      $soals = $soals->where('ujian_id', $id)->sortByDesc('id');
      $soal_ids = $soals->pluck('id');
      $soal_ids = $soal_ids->toArray();
      $pilihans = Pilihan::all();
      $pilihans = $pilihans->whereIn('soal_id', $soal_ids);
      $soalEssays = SoalEssay::all()->where('ujian_id', $id);

      //return $pilihans;
      return view('manajemen_soal.ujian.editSoal', compact('ujians','soals','pilihans','soalEssays'));
  }

  public function evaluasiJawaban($id)
  {
      // $siswas = Ujian::findOrFail($id)->siswas;
      $soals = Soal::all()->where('ujian_id', $id);
      $pilihans = Pilihan::all()->whereIn('soal_id', $soals->pluck('id')->toArray());
      $soalEssays = SoalEssay::all()->where('ujian_id', $id);
      $ujian = Ujian::findOrFail($id);
      $siswas = Siswa::all()->where('kejuruan_id', $ujian->kejuruans->id);
      // return $soals->count();
      // return $ujian;

      foreach ($siswas as $key => $siswa) {
        $benarPG = $siswa->pilihans->whereIn('pivot.pilihan_id', $pilihans->pluck('id'))->where('benar', 1)->count();
        if ($soals->count() > 0) {
          $nilaiPG = ($benarPG / $soals->count()) * 100;
        }
        else {
          $nilaiPG = 0;
        }
        $siswa->nilai_pilihan_ganda = $nilaiPG;

        $benarEssay = $siswa->soalEssays->where('ujian_id', $id)->pluck('pivot.nilai')->sum();
        if ($soalEssays->count() > 0) {
          $nilaiEssay = $benarEssay / $soalEssays->count();
        }
        else {
          $nilaiEssay = 0;
        }
        $siswa->nilai_essay = $nilaiEssay;

        $siswa->nilai_akhir = ($nilaiPG * 60/100) + ($nilaiEssay * 40/100);

        if ($siswa->nilai_akhir >= 80) {
          $siswa->grade = "A";
          $siswa->status = "LULUS";
        }
        else if ($siswa->nilai_akhir >= 75) {
          $siswa->grade = "B+";
          $siswa->status = "LULUS";
        }
        else if ($siswa->nilai_akhir >= 70) {
          $siswa->grade = "B";
          $siswa->status = "LULUS";
        }
        else if ($siswa->nilai_akhir >= 65) {
          $siswa->grade = "C+";
          $siswa->status = "LULUS";
        }
        else if ($siswa->nilai_akhir >= 60) {
          $siswa->grade = "C";
          $siswa->status = "LULUS";
        }
        else if ($siswa->nilai_akhir >= 50) {
          $siswa->grade = "D";
          $siswa->status = "TIDAK LULUS";
        }
        else {
          $siswa->grade = "E";
          $siswa->status = "TIDAK LULUS";
        }
      }

      // return $siswas;

      return view('manajemen_soal.ujian.evaluasi', compact('siswas', 'soals', 'pilihans', 'ujian'));
  }

  public function evaluasiEssay($id, $ujianId)
  {
      $siswas = Siswa::findOrFail($id)->soalEssays->where('ujian_id', $ujianId);

      return view('manajemen_soal.ujian.evaluasiEssay', compact('siswas','ujianId'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $ujians = Ujian::findOrFail($id);
      $ujians->update($request->all());
      return Redirect::route('ujian.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $ujians = Ujian::findOrFail($id);
      $ujians->delete();
      return Redirect::route('manajemen_soal.ujian.index');
  }
}

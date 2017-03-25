<?php

namespace App\Http\Controllers;

use App\Ujian;
use App\Kejuruan;
use App\Soal;
use App\Pilihan;
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
      $ujians = Ujian::all();
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
      //return $ujian;
      return view('manajemen_soal.ujian.edit', compact('ujians'));
  }

  public function editSoal($id)
  {
      $ujians = Ujian::findOrFail($id);
      $soals = Soal::all();
      $soals = $soals->where('ujian_id', $id);
      $soal_ids = $soals->pluck('id');
      $soal_ids = $soal_ids->toArray();
      $pilihans = Pilihan::all();
      $pilihans = $pilihans->whereIn('soal_id', $soal_ids);

      //return $pilihans;
      return view('manajemen_soal.ujian.editSoal', compact('ujians','soals','pilihans'));
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
      return Redirect::route('manajemen_soal.ujian.index');
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

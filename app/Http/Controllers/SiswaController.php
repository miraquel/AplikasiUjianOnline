<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use illuminate\Html;
use App\Siswa;
use App\Kejuruan;
use App\Agama;
use App\Pekerjaan;
use App\Status;
use App\Informasi;
use App\Pendidikan;

class SiswaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $siswas = Siswa::all();
      return view('siswa.index', compact('siswas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $kejuruans = Kejuruan::all();
      $agamas = Agama::all();
      $statuses = Status::all();
      $informasis = Informasi::all();
      $pekerjaans = Pekerjaan::all();
      $pendidikans = Pendidikan::all();
      return view('siswa.create', compact('kejuruans', 'agamas', 'statuses', 'informasis', 'pekerjaans', 'pendidikans'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      Siswa::create($request->all());
      return redirect('/siswa');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $siswas = Siswa::findOrFail($id);
      return view('siswa.show', compact('siswas'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $siswas = Siswa::findOrFail($id);
    $kejuruans = Kejuruan::all();
    $agamas = Agama::all();
    $statuses = Status::all();
    $informasis = Informasi::all();
    $pekerjaans = Pekerjaan::all();
    $pendidikans = Pendidikan::all();
    return view('siswa.create', compact('siswas','kejuruans', 'agamas', 'statuses', 'informasis', 'pekerjaans', 'pendidikans'));
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
      $siswas = Siswa::findOrFail($id);
      $siswas->update($request->all());
      return Redirect::route('siswa.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $siswas = Siswa::findOrFail($id);
      $siswas->delete();
      return Redirect::route('siswa.index');
  }
}

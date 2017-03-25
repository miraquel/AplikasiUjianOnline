<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use illuminate\Html;
use App\Kejuruan;

class KejuruanController extends Controller
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
      $kejuruans = Kejuruan::all();
      return view('filemaster.kejuruan.index', compact('kejuruans'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('filemaster.kejuruan.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      Kejuruan::create($request->all());
      return redirect('/kejuruan');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $kejuruans = Kejuruan::findOrFail($id);
      //return $kejuruan;
      return view('filemaster.kejuruan.edit', compact('kejuruans'));
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
      $kejuruans = Kejuruan::findOrFail($id);
      $kejuruans->update($request->all());
      return Redirect::route('filemaster.kejuruan.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $kejuruans = Kejuruan::findOrFail($id);
      $kejuruans->delete();
      return Redirect::route('filemaster.kejuruan.index');
  }
}

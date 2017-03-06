<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use illuminate\Html;
use App\Pendidikan;

class PendidikanController extends Controller
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
      $pendidikans = Pendidikan::all();
      return view('pendidikan.index', compact('pendidikans'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pendidikan.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      Pendidikan::create($request->all());
      return redirect('/pendidikan');
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
      $pendidikans = Pendidikan::findOrFail($id);
      //return $pendidikan;
      return view('pendidikan.edit', compact('pendidikans'));
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
      $pendidikans = Pendidikan::findOrFail($id);
      $pendidikans->update($request->all());
      return Redirect::route('pendidikan.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $pendidikans = Pendidikan::findOrFail($id);
      $pendidikans->delete();
      return Redirect::route('pendidikan.index');
  }
}

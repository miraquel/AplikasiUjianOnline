<?php

namespace App\Http\Controllers;

use App\SoalEssay;
use Illuminate\Http\Request;

class SoalEssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $soals = SoalEssay::all();
      return view('manajemen_soal.soal.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SoalEssay::create($request->all());
        //$no = $request->input('ujian_id');
        return redirect('ujian/'.$request->input('ujian_id').'/soal_pg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoalEssay  $soalEssay
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoalEssay  $soalEssay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoalEssay  $soalEssay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoalEssay  $soalEssay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $soalEssay = SoalEssay::findOrFail($id);
        $soalEssay->delete();
        return redirect('ujian/'.$request->input('ujian_id').'/soal_pg');
    }
}

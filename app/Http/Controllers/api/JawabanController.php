<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Pilihan;
use App\Soal;
use App\Siswa;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pilihan = Pilihan::find($request->pilihan_id);

        $siswa = Siswa::find($request->siswa_id);

        $pilihans = Soal::find($request->soal_id)->pilihans;

        // return $siswa;
        // return $pilihan;
        // return $siswa->pilihans;
        // return $pilihans;
        // return $siswa->pilihans->whereIn('id',$pilihans->pluck('id'))->pluck('id');



        if ($siswa->pilihans->whereIn('id',$pilihans->pluck('id'))->isNotEmpty())
        {
          // $getPilihan = Pilihan::find($siswa->pilihans->whereIn('id',$pilihans->pluck('id')));

          $siswa->pilihans()->detach($siswa->pilihans->whereIn('id',$pilihans->pluck('id'))->pluck('id'));

          $siswa->pilihans()->attach($request->pilihan_id);


          return 'exist';

        } else {

          $pilihan->siswas()->save($siswa);

          return 'new';

        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

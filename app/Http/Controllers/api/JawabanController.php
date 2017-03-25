<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Jawaban;
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
        $pilihan = null;
        $jawabanCheck = Jawaban::all()->contains('siswa_id', $request->siswa_id);
        $jawaban = Jawaban::where('siswa_id', $request->siswa_id);
        $pilihanSoal = Pilihan::find($request->pilihan_id)->soal;
        if ($pilihanSoal != null) {
            $pilihan = Pilihan::where('soal_id', $pilihanSoal->id)->get();
            $soalJawaban = Soal::find($pilihanSoal)->jawabans;
            if ($pilihan->contains($request->pili)) {
              # code...
            }
        }
        // $soal = Soal::find($pilihan)->pilihans;
        // $jawabanSiswa = Siswa::find($request->siswa_id)->jawabans;
        // $jawabanSoal = Jawaban::find($request->pilihan_id)->soal;

        // return $soalJawaban->where('siswa_id', $request->siswa_id);
        // return $jawabanSoal;
        return $pilihan;
        // return $soal;
        // return $jawaban;
        // return $jawabanSiswa;
        // return Soal::whereIn('')
        // return $soal->pluck('soal_id');
    }

    public function checkJawaban($pilihan, $pilihanSoal)
    {
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

<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;
use App\Siswa;
use Carbon\Carbon;

class UjianController extends Controller
{
    public function index($id = null)
    {
        if ($id == null) {
            return Ujian::orderBy('id', 'asc')->get();
        }
        else {
            return $this->show($id);
        }
    }

    public function getUjianKejuruan($id)
    {
        $ujians = Ujian::all();
        return $ujian = $ujians->where('kejuruan_id', $id)
          ->where('tanggal_selesai', '>', Carbon::now())
          ->where('tanggal_mulai', '<', Carbon::now());
    }

    public function postUjianSiswa(Request $request)
    {
        $ujian = Ujian::find($request->ujian_id);
        $siswa = Siswa::find($request->siswa_id);

        if ($ujian->siswas->contains($siswa)) {
            // $ujian->siswas()->detach($request->siswa_id);
        }
        else {
            $ujian->siswas()->save($siswa);
        }
        return $siswa->ujians->where('id', $request->ujian_id)->first()->pivot;
        // return $ujian->siswas;
    }
}

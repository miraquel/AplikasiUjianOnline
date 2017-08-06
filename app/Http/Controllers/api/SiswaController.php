<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        return Siswa::orderBy('nama', 'asc')->get();
    }

    public function getSiswaPilihan($id)
    {
        $siswa = Siswa::find($id);
        return $siswaPilihan = $siswa->pilihans;
    }
}

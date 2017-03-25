<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Ujian;

class AppsController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $ujians = Ujian::all();
        return view('apps.ujian', compact('siswas','ujians'));
    }
}

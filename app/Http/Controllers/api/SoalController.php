<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soal;

class SoalController extends Controller
{
    public function getSoalUjian($id)
    {
        return $soals = Soal::where('ujian_id', $id)->get();
    }
}

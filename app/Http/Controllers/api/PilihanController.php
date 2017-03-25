<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pilihan;

class PilihanController extends Controller
{
    public function getPilihanSoal($id)
    {
        return $pilihan = Pilihan::all()->where('soal_id', $id);
    }
}

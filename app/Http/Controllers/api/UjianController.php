<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ujian;

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
        return $ujians = Ujian::where('kejuruan_id', $id)->get();
    }

    public function store(Request $request)
    {

    }
}

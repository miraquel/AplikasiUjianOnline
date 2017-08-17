<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SoalEssay;
use App\Siswa;

class SoalEssayController extends Controller
{
    public function getSoalEssayUjian($id)
    {
        return $soalEssays = SoalEssay::where('ujian_id', $id)->get();
    }

    public function postJawabanEssaySiswa(Request $request)
    {
        $soalEssay = SoalEssay::find($request->soal_essay_id);
        $siswa = Siswa::find($request->siswa_id);

        // $soalEssay->siswas()->save([
        //   $request->siswa_id => ['jawaban' => $request->jawaban]
        // ]);

        if ($soalEssay->siswas->contains($siswa))
        {
          $soalEssay->siswas()->updateExistingPivot($request->siswa_id, ['jawaban' => $request->jawaban]);
        }
        else
        {
          $soalEssay->siswas()->save($siswa, ['nilai' => 0, 'jawaban' => $request->jawaban]);
        }
        return $soalEssay->siswas;
    }

    public function postNilaiEssaySiswa(Request $request)
    {
        $soalEssay = SoalEssay::findOrFail($request->soal_essay_id);
        $siswa = Siswa::findOrFail($request->siswa_id);
        $soalEssay->siswas()->updateExistingPivot($request->siswa_id, ['nilai' => $request->nilai]);
        return $soalEssay->siswas;
    }
}

@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <a class="btn btn-warning" href="{{ url('/ujian') }}">@fa(arrow-left) Kembali</a>
        <a class="btn btn-success pull-right" href="{{ url('/print/'.$ujian->id.'/ujian') }}">@fa(print) Print</a>
      </div>
      <div class="panel-body">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Nilai Pilihan Ganda</th>
              <th>Nilai Essay</th>
              <th>Skor Akhir</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($siswas as $key => $siswa)
              <tr>
                <td>{{ $siswa->nama }}</td>
                <td><label class="label label-primary lb-md">{{ number_format($siswa->nilai_pilihan_ganda,2) }}</label> ( {{ $siswa->pilihans->whereIn('pivot.pilihan_id', $pilihans->pluck('id'))->where('benar', 1)->count() }} / {{ $soals->count() }} Jawaban Benar)</td>
                <td><label class="label label-primary lb-md">{{ number_format($siswa->nilai_essay,2) }}</label></td>
                <td><label class="label label-primary lb-md">{{ number_format($siswa->nilai_akhir,2) }}</label></td>
                <td><a href="{{ url('siswa/'.$siswa->id.'/essay/'.$soals->first()->ujian_id.'/ujian') }}" class="btn btn-primary pull-right">@fa(pencil) Evaluasi Jawaban Essay</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

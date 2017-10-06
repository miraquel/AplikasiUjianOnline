@extends('layouts.app')

@section('titlepage')
  Ujian Telah Selesai
@endsection

@section('content')
  <div class="container">
    <div id="finish-exam-panel" class="panel panel-default">
      <div class="panel-heading">
        <h1 class="text-center">Ujian Selesai, Terima Kasih Sudah Mengikuti Ujian!</h1>
      </div>
      <div class="panel-body">
        <h2>Detail Ujian</h2>
        <hr>
        <div class="row">

          <div class="form-group">
            <label class="control-label col-md-3">Deskripsi</label>
            <div class="col-md-9">
              <label>: {{ $ujian->deskripsi }}</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Tanggal Mulai</label>
            <div class="col-md-9">
              <label>: {{ $ujian->tanggal_mulai }}</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Tanggal Selesai</label>
            <div class="col-md-9">
              <label>: {{ $ujian->tanggal_selesai }}</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Durasi</label>
            <div class="col-md-9">
              <label id="durasi">{{ $ujian->durasi }}</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Jumlah Soal</label>
            <div class="col-md-9">
              <label>: {{ $soals->count() }} Soal Pilihan Ganda dan {{ $soalEssays->count() }} Soal Essays</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Skor Soal Pilihan Ganda</label>
            <div class="col-md-9">
              <b>: </b><label class="label label-primary lb-md">{{ number_format($siswas->nilai_pilihan_ganda,2) }}</label> <label>( {{ $siswas->pilihans->whereIn('pivot.pilihan_id', $pilihans->pluck('id'))->where('benar', 1)->count() }} / {{ $soals->count() }} Jawaban Benar)</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Skor Soal Essay</label>
            <div class="col-md-9">
              <label>: Menunggu Evaluasi</label>
            </div>
          </div>

        </div>
      </div>
      <div class="panel-footer">
        <a class="btn btn-success" href="{{ url('/apps/ujian') }}">Kembali Ke Aplikasi</a>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
  $(document).ready(function (){
    moment.locale('id');
    var dur = {{ $ujian->durasi }};
    $(function() {
      //dur = moment.duration($(".durasi").text());
      //$(".durasi").text(dur);
      $("#durasi").text(function(index,txtDur) {
        console.log(txtDur);
        dur = moment.duration(parseInt(txtDur));
        var txtSeconds = moment.duration(parseInt(txtDur));
        var txtMinutes = moment.duration(parseInt(txtDur));
        var txtHours = moment.duration(parseInt(txtDur));
        return ": "+dur.hours()+" Jam "+dur.minutes()+" Menit "+dur.seconds()+" Detik";
      });
    });
  });
  </script>
@endsection

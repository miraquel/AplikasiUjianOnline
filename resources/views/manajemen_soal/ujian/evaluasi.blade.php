@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <a class="btn btn-warning" href="{{ url('/ujian') }}">@fa(arrow-left) Kembali</a>
        <a class="btn btn-success pull-right" href="{{ url('/print/'.$ujian->id.'/ujian') }}">@fa(print) Print</a>
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
            <label class="control-label col-md-3">Jumlah Siswa</label>
            <div class="col-md-9">
              <label>: {{ $siswas->count() }} Orang</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Rata-Rata Nilai Akhir Siswa</label>
            <div class="col-md-9">
              <label>: {{ number_format($siswas->sum('nilai_akhir') / $siswas->count(),2) }}</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Nilai Akhir Terbesar</label>
            <div class="col-md-9">
              <label>: {{ number_format($siswas->max('nilai_akhir'),2) }}</label>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Nilai Akhir Terkecil</label>
            <div class="col-md-9">
              <label>: {{ number_format($siswas->min('nilai_akhir'),2) }}</label>
            </div>
          </div>

        </div>
        <hr>
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Nilai Pilihan Ganda</th>
              <th>Nilai Essay</th>
              <th>Skor Akhir</th>
              <th>Grade</th>
              <th>Status</th>
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
                @if ($siswa->grade == "A")
                  <td><label class="label label-success lb-md">{{ $siswa->grade }}</label></td>
                @elseif ($siswa->grade == "B" | $siswa->grade == "B+")
                  <td><label class="label label-primary lb-md">{{ $siswa->grade }}</label></td>
                @elseif ($siswa->grade == "C" | $siswa->grade == "C+")
                  <td><label class="label label-primary lb-md">{{ $siswa->grade }}</label></td>
                @elseif ($siswa->grade == "D" | $siswa->grade == "D+")
                  <td><label class="label label-warning lb-md">{{ $siswa->grade }}</label></td>
                @else
                  <td><label class="label label-danger lb-md">{{ $siswa->grade }}</label></td>
                @endif
                @if ($siswa->status == "LULUS")
                  <td><label class="label label-success lb-md">{{ $siswa->status }}</label></td>
                @else
                  <td><label class="label label-danger lb-md">{{ $siswa->status }}</label></td>
                @endif
                @if ($soals->count() > 0)
                  <td><a href="{{ url('siswa/'.$siswa->id.'/essay/'.$soals->first()->ujian_id.'/ujian') }}" class="btn btn-primary pull-right">@fa(pencil) Evaluasi Jawaban Essay</a></td>
                @else
                  <td>Tidak Ada Jawaban Untuk Dievaluasi</td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
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

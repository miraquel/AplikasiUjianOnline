<html>
  <head>
    <link href="/home/miraquel/Laravel/AplikasiUjianBLKI/public/css/app.css" rel="stylesheet">
    <style>
      .lb-sm {
        font-size: 12px;
      }

      .lb-md {
        font-size: 16px;
      }

      .lb-lg {
        font-size: 20px;
      }

      .td-center {
        text-align: center;
        vertical-align: middle;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-2">
          <img src="/home/miraquel/Laravel/AplikasiUjianBLKI/public/images/BLKI-Provinsi-Banten.png" height="100vm" alt="">
        </div>
        <div class="col-xs-5">
          <label class="text-uppercase">Balai Latihan Kerja Industri</label>
          <br>
          <label class="text-uppercase">Provinsi Banten</label>
          <p>Jl. Raya Serpong KM.12, Lengkong Karya, Serpong Utara, Kota Tangerang Selatan, Banten 15310</p>
        </div>
        <div class="col-xs-5">
          <p class="pull-right">Tanggal Cetak : {{ Carbon\Carbon::now() }}</p>
        </div>
      </div>
      <hr>
      <h1>Daftar Nilai Ujian</h1>

      <div class="row">
        <div class="col-xs-3">Kejuruan</div>
        <div class="col-xs-8">: {{ $ujian->kejuruans->deskripsi }}</div>
      </div>

      <div class="row">
        <div class="col-xs-3">Nama Ujian</div>
        <div class="col-xs-8">: {{ $ujian->deskripsi }}</div>
      </div>

      <div class="row">
        <div class="col-xs-3">Tanggal/Jam Mulai</div>
        <div class="col-xs-8">: {{ $ujian->tanggal_mulai }}</div>
      </div>

      <div class="row">
        <div class="col-xs-3">Tanggal/Jam Selesai</div>
        <div class="col-xs-8">: {{ $ujian->tanggal_selesai }}</div>
      </div>

      <div class="row">
        <div class="col-xs-3">Durasi</div>
        <div class="col-xs-8">: {{ gmdate("H:i:s", $ujian->durasi) }}</div>
      </div>
      <hr>

      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Nilai Pilihan Ganda</th>
            <th>Nilai Essay</th>
            <th>Nilai Akhir</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no_increment = 0;
          @endphp
          @foreach ($siswas as $key => $siswa)
            @if ($siswa->nilai_akhir > 80)
              <tr class="success">
            @elseif ($siswa->nilai_akhir > 60)
              <tr class="primary">
            @elseif ($siswa->nilai_akhir > 40)
              <tr class="warning">
            @else
              <tr class="danger">
            @endif
              <td>{{ ++$no_increment }}</td>
              <td>{{ $siswa->nama }}</td>
              <td><label class="label label-primary lb-sm">{{ number_format($siswa->nilai_pilihan_ganda,2) }}</label> ( {{ $siswa->pilihans->whereIn('pivot.pilihan_id', $pilihans->pluck('id'))->where('benar', 1)->count() }} / {{ $soals->count() }} Jawaban Benar)</td>
              <td class="td-center"><label class="label label-primary lb-sm">{{ number_format($siswa->nilai_essay,2) }}</label></td>
              <td class="td-center"><label class="label label-primary lb-sm">{{ number_format($siswa->nilai_akhir,2) }}</label></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>

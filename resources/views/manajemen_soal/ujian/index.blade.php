@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Ujian</h1>
    Tambah daftar data Ujian
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Ujian
            <a class="pull-right" href="{{ url('/ujian/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($ujians) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Jurusan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Durasi</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ujians as $ujian)
                    <tr>
                      <td>{{ $ujian->deskripsi }}</td>
                      <td>{{ $ujian->kejuruans->deskripsi }}</td>
                      <td>{{ $ujian->tanggal_mulai }}</td>
                      <td>{{ $ujian->tanggal_selesai }}</td>
                      <td class="durasi">{{ $ujian->durasi }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ url('ujian/'.$ujian->id.'/soal_pg') }}" class="btn btn-primary btn-sm" type="button">@fa(edit) Edit Data Soal</a>
                          <a href="{{ route('ujian.show', $ujian->id) }}" class="btn btn-primary btn-sm" type="button">@fa(table) Detail</a>
                          <a href="{{ route('ujian.edit', $ujian->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('ujian.destroy', $ujian->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('ujian.destroy', $ujian->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
                            </form>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              Tidak Ada Data
            @endif
          </div>
        </div>
      </div>
    </div>
  @endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function (){
          moment.locale('id');
          var dur;
          $(function() {
            //dur = moment.duration($(".durasi").text());
            //$(".durasi").text(dur);
            $(".durasi").text(function(index,txtDur) {
              console.log(txtDur);
              dur = moment.duration(parseInt(txtDur));
              var txtSeconds = moment.duration(parseInt(txtDur));
              var txtMinutes = moment.duration(parseInt(txtDur));
              var txtHours = moment.duration(parseInt(txtDur));
              return dur.hours()+" Jam "+dur.minutes()+" Menit "+dur.seconds()+" Detik";
            });
          });
        });
    </script>
@endsection
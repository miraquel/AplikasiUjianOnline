@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="page-header">
      <h1>Tambah Data Ujian<h1>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">Isi Data Ujian</div>

        <form action="{{ route('ujian.store') }}" method="post">
          <div class="panel-body">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label" for="kejuruan_id">Kejuruan</label>
              <select class="form-control" name="kejuruan_id" id="kejuruan_id">
                <option value="" disabled selected>Pilih Kejuruan</option>
                @foreach ($kejuruans as $kejuruan)
                  <option value="{{ $kejuruan->id }}">{{ $kejuruan->deskripsi }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label" for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi tentang ujian ini">
            </div>

            <div class="form-group">
              <label class="control-label" for="tanggal">Tanggal dan Jam Mulai Ujian</label>
              <input type="datetime-local" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
            </div>

            <div class="form-group">
              <label class="control-label" for="tanggal">Tanggal dan Jam Selesai Ujian</label>
              <input type="datetime-local" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
            </div>

            <div class="form-group">
              <label class="control-label" for="durasi">Durasi Ujian</label>
              <br>
              <input id="hours" name="value" value=0 size=3/>
              <input id="minutes" name="value" value=0  size=2/>
              <input id="seconds" name="value" value=0 size=2/>
              <br>
              <label class="control-label" id="lblTime"></label>
              <input type="text" name="durasi" id="time" hidden>
            </div>
          </div>
          <div class="panel-footer">
            <a class="btn btn-danger" href="{{ route('ujian.index') }}">Batal</a>
            <input type="submit" class="btn btn-success pull-right">
          </div>
        </form>
      </div>
    </div>
  @endsection

  @section('js')
    <script type="text/javascript">
    $(document).ready(function(){
      moment.locale('id');
      var dur;
      $(function () {
        $('#seconds').spinner({
          spin: function (event, ui) {
            if (ui.value >= 60) {
              $(this).spinner('value', ui.value - 60);
              $('#minutes').spinner('stepUp');
              return false;
            } else if (ui.value < 0) {
              $(this).spinner('value', ui.value + 60);
              $('#minutes').spinner('stepDown');
              return false;
            }
          },
          stop: function (event, ui) {
            $("#time").trigger("click");
          }
        });

        $('#minutes').spinner({
          spin: function (event, ui) {
            if (ui.value >= 60) {
              $(this).spinner('value', ui.value - 60);
              $('#hours').spinner('stepUp');
              return false;
            } else if (ui.value < 0) {
              $(this).spinner('value', ui.value + 60);
              $('#hours').spinner('stepDown');
              return false;
            }
          },
          stop: function (event, ui) {
            $("#time").trigger("click");
          },
          create: function (event, ui) {
            $("#time").trigger("click");
          }
        });

        $('#hours').spinner({
          min: 0,
          stop: function (event, ui) {
            $("#time").trigger("click");
          }});
        });

        $("#time").click(function(){
          //$("#time").val($("#hours").val()+":"+$("#minutes").val()+":"+$("#seconds").val());
          dur = moment.duration({
            hours : $("#hours").val(),
            minutes : $("#minutes").val(),
            seconds : $("#seconds").val()
          }, "minutes");
          $("#time").val(dur.asMilliseconds());
          $("#lblTime").text(dur.hours()+" Jam "+dur.minutes()+" Menit "+dur.seconds()+" Detik ");
          console.log(dur.asMilliseconds());
        });
      });
      </script>
    @endsection

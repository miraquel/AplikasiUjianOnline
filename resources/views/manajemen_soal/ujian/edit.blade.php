@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="page-header">
      <h1>Edit Data Ujian<h1>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">Edit Data Ujian</div>

        <form action="{{ route('ujian.update', $ujians->id) }}" method="post">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="panel-body">
            <div class="form-group">
              <label class="control-label" for="kejuruan_id">Kejuruan</label>
              <select class="form-control" name="kejuruan_id" id="kejuruan_id">
                <option value="" disabled>Pilih Kejuruan</option>
                @foreach ($kejuruans as $kejuruan)
                  @if ($kejuruan->id == $ujians->kejuruan_id)
                    <option value="{{ $kejuruan->id }}" selected>{{ $kejuruan->deskripsi }}</option>
                  @else
                    <option value="{{ $kejuruan->id }}">{{ $kejuruan->deskripsi }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label" for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $ujians->deskripsi }}" placeholder="deskripsi tentang ujian ini">
            </div>

            <div class="form-group">
              <label class="control-label" for="tanggal">Tanggal dan Jam Mulai Ujian</label>
              <input type="datetime-local" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ujians->tanggal_mulai)->format('Y-m-d\\TH:i') }}">
            </div>

            <div class="form-group">
              <label class="control-label" for="tanggal">Tanggal dan Jam Selesai Ujian</label>
              <input type="datetime-local" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ujians->tanggal_selesai)->format('Y-m-d\\TH:i') }}">
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
      var durasi = moment.duration({{ $ujians->durasi }});
      console.log('durasi : '+durasi);
      $('#kejuruan_id select').val('{{ $ujians->kejuruan_id }}');
      $('#hours').val(durasi.hours());
      $('#minutes').val(durasi.minutes());
      $('#seconds').val(durasi.seconds());
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

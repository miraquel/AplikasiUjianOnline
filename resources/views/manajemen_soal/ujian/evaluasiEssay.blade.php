@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        test
      </div>
      <div class="panel-body">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th class="col-md-1">No.</th>
              <th class="col-md-3">Pertanyaan</th>
              <th class="col-md-5">Jawaban</th>
              <th class="col-md-1">Nilai Siswa</th>
              <th class="col-md-2">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($siswas as $key => $siswa)
              @php
                $noUrut = 0;
              @endphp
              <tr>
                <td>{{ ++$noUrut }}</td>
                <td>{{ $siswa->deskripsi }}</td>
                <td>{{ $siswa->pivot->jawaban }}</td>
                <td class="td-center td-nilai"><label class="label label-primary lb-md label-nilai">{{ $siswa->pivot->nilai }}</label></td>
                <td>
                  <div class="form-group" data-siswa="{{ $siswa->pivot->siswa_id }}" data-soal="{{ $siswa->pivot->soal_essay_id }}">
                    <div class="row">
                      <div class="col-md-12">
                        <input type="number" class="form-control nilai-essay" min="0" max="100">
                        <button type="button" class="btn btn-success btn-block kirim-nilai-essay">Kirim</button>
                      </div>
                      <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="row">
                      <label class="col-md-12 control-label label-status-kirim-essay">
                      </label>
                    </div>
                  </div>
                  {{-- <input class="form-control nilai-essay" type="number" min="0" max="100" placeholder="masukkan nilai (skala 1-100)">
                  <button class="btn btn-success btn-block kirim-nilai-essay" type="button">Kirim</button> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="panel-footer">
        <a href="{{ url('ujian/'.$ujianId.'/jawaban') }}" style="margin-right:5px" class="btn btn-primary btn-sm" type="button">Evaluasi Jawaban Siswa</a>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      console.log('mulai');
      // changeLabelNilai($('.label-nilai'),$('.label-nilai').text());
      $('.kirim-nilai-essay').click('enter',function() {
        var nilai = $(this).siblings('.nilai-essay').val();
        if (nilai <= 100 && nilai >= 0) {
          var soal_essay_id = $(this).parents('.form-group').data('soal');
          var siswa_id = $(this).parents('.form-group').data('siswa');
          postJawabanEssaySiswa(siswa_id, soal_essay_id, nilai, $(this));
        }
        else {
          $(this).parents('.form-group')
            .removeClass('has-success')
            .addClass('has-error has-feedback');
          $(this).parents('.form-group')
            .find('.form-control-feedback')
            .removeClass('glyphicon-ok')
            .addClass('glyphicon-remove');
          $(this).parents('.form-group')
            .find('.label-status-kirim-essay')
            .velocity(
              'transition.fadeIn',
              {
                begin: function() {
                  $(this)
                  .text('skala nilai harus 1-100 !');
                }
              }
            );
        }
      });

      function postJawabanEssaySiswa(siswa_id, soal_essay_id, nilai, object) {
        $.ajax({
          url: 'http://localhost:8000/api/soal_essay/siswa/nilai',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            siswa_id: siswa_id,
            soal_essay_id: soal_essay_id,
            nilai: nilai
          },
          type: "POST",
          dataType: "json",
          success: function(data) {
            console.log(data);
            object.parents('.form-group')
              .removeClass('has-error')
              .addClass('has-success has-feedback');
            object.parents('.form-group')
              .find('.form-control-feedback')
              .removeClass('glyphicon-remove')
              .addClass('glyphicon-ok');
            object.parents('.form-group')
              .find('.label-status-kirim-essay')
              .velocity(
                'transition.fadeIn',
                {
                  begin: function() {
                    $(this)
                      .text('Data nilai berhasil disimpan');
                    // changeLabelNilai();
                    changeLabelNilai(object.parents('td').siblings('.td-nilai').find('.label-nilai'), nilai);
                    // console.log(object.parents('td').siblings('.td-nilai').find('.label-nilai'));
                  }
                }
              );
          },
          error: function(data) {
            console.log(data);
            object.parents('.form-group')
              .removeClass('has-success')
              .addClass('has-error has-feedback');
            object.parents('.form-group')
              .find('.form-control-feedback')
              .removeClass('glyphicon-ok')
              .addClass('glyphicon-remove');
            object.parents('.form-group')
              .find('.label-status-kirim-essay')
              .velocity(
                'transition.fadeIn',
                {
                  begin: function() {
                    object
                    .text('Data nilai gagal disimpan, cek koneksi jaringan !');
                  }
                }
              );
          }
        });
      }

      function changeLabelNilai(object, nilai) {
        if (nilai >= 80) {
          object
            .removeClass('label-danger label-warning label-success')
            .addClass('label-success')
            .text(nilai);
        }
        else if (nilai >= 60) {
          object
            .removeClass('label-danger label-warning label-success')
            .addClass('label-primary')
            .text(nilai);
        }
        else if (nilai >= 40) {
          object
            .removeClass('label-danger label-warning label-success')
            .addClass('label-warning')
            .text(nilai);
        }
        else {
          object
            .removeClass('label-danger label-warning label-success')
            .addClass('label-danger')
            .text(nilai);
        }
      }

    });
  </script>
@endsection

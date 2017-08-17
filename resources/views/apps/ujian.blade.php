@extends('layouts.app')

@section('titlepage')
  Aplikasi Ujian BLKI
@endsection

@section('content')
  <div class="container">
      <div class="page-header">
          <h1>Aplikasi Ujian BLKI<h1>
      </div>
      <div id="verification-panel" class="panel panel-primary">
          <div class="panel-heading">Lengkapi Data Dibawah Ini</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div id="label-verification" class="alert alert-info">
                  <strong>Verifikasi Data Anda!</strong> pilih nama anda pada table dibawah. kemudian, input tanggal lahir anda pada isian tanggal lahir
                </div>
              </div>
              <div class="col-md-12 div-verification">
                <input id="search-siswa-input" type="text" name="search-siswa" class="form-control" placeholder="Cari Nama Siswa...">
              </div>
            </div>
            <div class="row" style="margin-top:20px">
              <div id="div-ujian" class="col-md-6" hidden>
                <label>Pilih Ujian Yang Akan Diujikan</label>
                <button id="btn-refresh-ujian" class="btn btn-primary pull-right" type="button">Refresh</button>
                <table id="table-ujian" class="table table-hover">
                  <thead>
                    <th>Nama Ujian</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Durasi</th>
                  </thead>
                  <tbody id="body-ujian">
                  </tbody>
                </table>
              </div>
              <div class="col-md-6 div-verification">
                @if (count($siswas) > 0)
                  <table id="table-result" class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama</th>
                      </tr>
                    </thead>
                    <tbody id="nama-siswa-body">
                      @foreach ($siswas as $siswa)
                        <tr class="nama-siswa-tr">
                          <td class="nama-siswa-td">{{ $siswa->nama }}</td>
                          <td class="id-siswa-td" hidden>{{ $siswa->id }}</td>
                          <td class="birth-siswa-td" hidden>{{ $siswa->tanggal_lahir }}</td>
                          <td class="kejuruan-siswa-td" hidden>{{ $siswa->kejuruan_id }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  Tidak Ada Data
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group div-verification">
                  <label class="control-label" for="tanggal-lahir">Verivikasi Tanggal Lahir</label>
                  <input id="tanggal-lahir-verification" class="form-control" type="date" name="tanggal-lahir">
                </div>
                <button id="button-verification" type="button" class="btn btn-primary div-verification">Cek Validasi</button>
              </div>
            </div>
          </div>
          <div class="panel-footer">
              {{-- <a class="btn btn-danger" href=" route('siswa.index') ">Batal</a>
              <input type="submit" class="btn btn-success pull-right"> --}}
              <button class="btn btn-success" type="button" id="click-start" disabled>Mulai</button>
          </div>
      </div>

      <div id="exam-panel" class="panel panel-primary" hidden>
        <div class="panel-heading">
          Ujian Dimulai, Selamat Mengerjakan
        </div>
        <div id="exam-panel-body" class="panel-body">

        </div>
        <div class="panel-footer">
          <button class="btn btn-success" type="button" name="button">Button Kirim</button>
        </div>
      </div>
      <div id="timer-navbar" class="navbar navbar-inverse navbar-fixed-bottom" hidden>
        <div class="container">
          <div class="navbar-text">
            <label class="clock" style="font-size:20pt;color:#ffffff;"></label>
          </div>
          <button id="btn-selesai-ujian" type="button" style="font-size:20pt;" class="navbar-btn btn-success btn pull-right">Selesai</button>
        </div>
      </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
      moment.locale('id');
      var siswaCurrentId;
      var siswaCurrentBirthDate;
      var ujian;
      var soal;
      var soalEssay;
      var pilihan;
      var jamMulai;
      var jamSelesai;
      var siswaPilihan;
      var interval;
      var intervalListUjian;

      var ujianSelected;
      var durasiUjian;

      function update() {
        // console.log(jamSelesai);
        var sekarang = moment();
        if (sekarang.isBefore(jamSelesai)) {
          hitungWaktuUjian = moment.duration(jamSelesai.diff(sekarang, 'milliseconds'));
          console.log("test");
          $("#timer-navbar .clock").text("Waktu Tersisa : "+hitungWaktuUjian.hours()+":"+hitungWaktuUjian.minutes()+":"+hitungWaktuUjian.seconds()+":"+hitungWaktuUjian.milliseconds());
        }
        else {
          clearInterval(interval);
          $('#exam-panel').hide(1000);
          $('#btn-selesai-ujian').prop('disabled');
        }
      }

      function loadExistingAnswer() {
        $.each(siswaPilihan, function(key, val){
          $("#pilihan-"+val.id).prop('checked', true);
        });
      }

      var siswa = (function () {
        var siswa = null;
        $.ajax({
          'async': false,
          'global': false,
          'url': 'http://localhost:8000/api/siswa',
          'dataType': "json",
          'success': function (data) {
            siswa = data;
          }
        });
        return siswa;
      })();

      function getSiswaPilihan(siswa_id) {
        siswaPilihan = (function () {
          var siswaPilihan = null;
          $.ajax({
            'async': false,
            'global': false,
            'url': 'http://localhost:8000/api/siswa/'+siswa_id+'/pilihan',
            'dataType': "json",
            'success': function (data) {
              siswaPilihan = data;
            }
          });
          return siswaPilihan;
        })();
      }

      function getUjianSiswa(kejuruan_id) {
        ujian = (function () {
          var ujian = null;
          $.ajax({
            'async': false,
            'global': false,
            'url': 'http://localhost:8000/api/ujian/'+kejuruan_id+'/kejuruan',
            'dataType': "json",
            'success': function (data) {
              ujian = data;
            }
          });
          return ujian;
        })();
      }

      function getSoalUjian(ujian_id) {
        soal = (function () {
          var soal = null;
          $.ajax({
            'async': false,
            'global': false,
            'url': 'http://localhost:8000/api/soal/'+ujian_id+'/ujian',
            'dataType': "json",
            'success': function (data) {
              soal = data;
            }
          });
          return soal;
        })();
      }

      function getSoalEssayUjian(ujian_id) {
        soalEssay = (function () {
          var soalEssay = null;
          $.ajax({
            'async': false,
            'global': false,
            'url': 'http://localhost:8000/api/soal_essay/'+ujian_id+'/ujian',
            'dataType': "json",
            'success': function (data) {
              soalEssay = data;
            }
          });
          return soalEssay;
        })();
      }

      function getPilihanSoal(soal_id) {
        pilihan = (function () {
          var pilihan = null;
          $.ajax({
            'async': false,
            'global': false,
            'url': 'http://localhost:8000/api/pilihan/'+soal_id+'/soal',
            'dataType': "json",
            'success': function (data) {
              pilihan = data;
            }
          });
          return pilihan;
        })();
      }

      $('#btn-refresh-ujian').click(function() {
        loadUjianSiswa();
      });

      // $('#btn-selesai-ujian').click(function() {
      //
      // })

      function loadUjianSiswa() {
          $('#table-ujian > tbody').empty();
          $('#click-start').prop('disabled', true);
          getUjianSiswa(siswaCurrentMajor);
          if (ujian.length == 0) {
            $('#table-ujian > tbody').append('<tr><td colspan="4">tidak ada jadwal ujian saat ini</td></tr>');
          }
          else {
            $.each(ujian, function(key, val){
              $('#table-ujian > tbody').append('<tr class="tr-ujian"><td class="td-ujian-id" hidden>'+val.id+'</td><td class="td-ujian-deskripsi">'+val.deskripsi+'</td><td class="td-ujian-tanggal-mulai">'+val.tanggal_mulai+'</td><td class="td-ujian-tanggal-selesai">'+val.tanggal_selesai+'</td><td>'+moment.duration(val.durasi).hours()+' Jam '+moment.duration(val.durasi).minutes()+' Menit '+moment.duration(val.durasi).seconds()+' Detik </td>'+'<td class="td-ujian-durasi" hidden>'+val.durasi+'</td></tr>');
            });
          }
      }

      $('#button-verification').click(function() {
        if (siswaCurrentBirthDate == $('#tanggal-lahir-verification').val()) {
          $('#label-verification')
            .velocity(
              {
                opacity: 0
              },
              {
                duration: 500,
                complete: function() {
                  $('#label-verification')
                    .removeClass('alert-info alert-danger')
                    .addClass('alert-success')
                    .html("<strong>Verifikasi Data Sukses!</strong> Silahkan pilih ujian yang ingin anda ikuti")
                    .velocity("transition.fadeIn");
                  $('.div-verification').velocity("transition.fadeOut",300);
                  $('#div-ujian').velocity("transition.fadeIn",300);
                }
              }
            );
          //$.Velocity.RunSequence(loadingSequence);
          loadUjianSiswa();
          intervalListUjian = setInterval(loadUjianSiswa,10000);
          console.log(ujian);
        }
        else {
          $('#label-verification')
            .velocity(
              {
                opacity: 0
              },
              {
                duration: 200,
                complete: function() {
                  $('#label-verification')
                    .removeClass('alert-info')
                    .addClass('alert-danger')
                    .html("<strong>Verifikasi Data Gagal!</strong> Pastikan nama anda sesuai dengan tanggal lahir yang anda masukkan")
                    .velocity("transition.fadeIn");
                }
              }
            );
        }
      })

      $('#nama-siswa-body').on("click", ".nama-siswa-tr", function() {
        var selected = $(this).hasClass("active");
        $("#nama-siswa-body .nama-siswa-tr").removeClass("active");
        if (!selected) {
          $(this).addClass("active");
        }
        siswaCurrentId = $(this).find(".id-siswa-td").text();
        siswaCurrentBirthDate = $(this).find(".birth-siswa-td").text();
        siswaCurrentMajor = $(this).find(".kejuruan-siswa-td").text();
        console.log(siswaCurrentId);
        console.log(siswaCurrentBirthDate);
      });

      $('#body-ujian').on("click", ".tr-ujian", function() {
        $(this).addClass("active");
        ujianSelected = $(this).find(".td-ujian-id").text();
        durasiUjian = $(this).find(".td-ujian-durasi").text();
        if ($('#click-start').prop('disabled')) {
          $('#click-start').prop('disabled', false);
        }
      });

      function postJawabanSiswa(siswa_id, pilihan_id, soal_id) {
        $.ajax({
          url: 'http://localhost:8000/api/jawaban',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            siswa_id: siswa_id,
            pilihan_id: pilihan_id,
            soal_id: soal_id
          },
          type: "POST",
          dataType: "json",
          success: function(data) {
            console.log(data);
          },
          error: function(data) {
            console.log(data);
          }
        });
      }

      function postUjianSiswa(ujian_id, siswa_id) {
        $.ajax({
          url: 'http://localhost:8000/api/ujian/siswa',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            ujian_id: ujian_id,
            siswa_id: siswa_id
          },
          type: "POST",
          dataType: "json",
          success: function(data) {
            _jamMulai = moment(data.created_at);
            jamMulai = _jamMulai.add(durasiUjian);
            jamSelesai = moment(jamMulai);
            // var totalDurasi = jamSelesai.diff(now, 'milliseconds');
          },
          error: function(data) {
            console.log(data);
          }
        });
      }

      function postSoalEssaySiswa(soal_essay_id, siswa_id, jawaban) {
        $.ajax({
          url: 'http://localhost:8000/api/soal_essay/siswa',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            soal_essay_id: soal_essay_id,
            siswa_id: siswa_id,
            jawaban: jawaban
          },
          type: "POST",
          dataType: "json",
          success: function(data) {
            $('#soal-essay-'+soal_essay_id)
              .removeClass("panel-default panel-danger")
              .addClass("panel-success");
            $('#soal-essay-'+soal_essay_id)
              .find('.label-status-kirim-essay')
              .addClass('label label-success')
              .text('Jawaban Sukses Terkirim!');
          },
          error: function(data) {
            $('#soal-essay-'+soal_essay_id)
              .removeClass("panel-default panel-success")
              .addClass("panel-danger");
            $('#soal-essay-'+soal_essay_id)
              .find('.label-status-kirim-essay')
              .addClass('label label-danger')
              .text('Jawaban Gagal Terkirim!');
          }
        });
      }

      $('#exam-panel-body').on("click", ".pilihan", function() {
        console.log("pilihan_id : "+$(this).val());
        // console.log($('meta[name="csrf-token"]').attr('content'));
        console.log("soal_id : "+$(this).data('soal'));
        postJawabanSiswa(siswaCurrentId, $(this).val(), $(this).data('soal'));
        // console.log($(this).not(this));
        if ($(this).not(this).prop('checked', true)) {
          console.log('true');
        }
        else {
          console.log('false');
        }
      });

      $('#search-siswa-input').keyup(function(){
        $('#table-result > tbody').empty();
        $.each(siswa, function(key, val){
          // items.push(val);
          if (val.nama.toLowerCase().indexOf($('#search-siswa-input').val().toLowerCase()) >= 0) {
            $('#table-result > tbody').append('<tr class="nama-siswa-tr"><td class="nama-siswa-td">'+val.nama+'</td><td class="id-siswa-td" hidden>'+val.id+'</td><td class="kejuruan-siswa-td" hidden>'+val.kejuruan_id+'</td><td class="birth-siswa-td" hidden>'+val.tanggal_lahir+'</td></tr>');
            console.log(val.nama);
          }
        });
      });

      $('#click-start').click(function() {
        getSiswaPilihan(siswaCurrentId);
        console.log(siswaCurrentId);
        console.log(ujianSelected);
        postUjianSiswa(ujianSelected, siswaCurrentId);
        $('#verification-panel').hide(1000, startExam(ujianSelected));
        clearInterval(intervalListUjian);
        interval = setInterval(update, 10);
        $('#timer-navbar').show(1000);
        console.log(siswaPilihan);
      });

      $('#exam-panel-body').on('click', '.kirim-essay', function () {
        var soal_essay_id = $(this).data('essay');
        var siswa_id = siswaCurrentId;
        var jawaban = $('#jawaban-essay-'+$(this).data('essay')).val();
        postSoalEssaySiswa(soal_essay_id, siswaCurrentId, jawaban);
      })

      function startExam(id) {
        console.log(id);
        $('#verification-panel').hide(1000);
        $('#exam-panel').show(500);
        getSoalUjian(id);
        getSoalEssayUjian(id);
        console.log(soal);
        $.each(soal, function(key, _soal) {
          $('#exam-panel-body').append(
            '<div id="soal-'+_soal.id+'" class="panel panel-default">\
              <div class="panel-heading">'+_soal.deskripsi+'</div>\
              <div class="panel-body"></div>\
            </div>'
          );
          getPilihanSoal(_soal.id);
          $.each(pilihan, function(key, _pilihan) {
            $("#soal-"+_soal.id+" .panel-body").append(
              '<div class="radio"><label><input id="pilihan-'+_pilihan.id+'" type="radio" class="pilihan" data-soal="'+_soal.id+'" value="'+_pilihan.id+'" name="pilihan-soal-'+_soal.id+'">'+_pilihan.deskripsi+'</label></div>'
            );
          });
        });
        $.each(soalEssay, function(key, val) {
          $('#exam-panel-body').append(
            '<div id="soal-essay-'+val.id+'" class="panel panel-default">\
              <div class="panel-heading">'+val.deskripsi+'</div>\
              <div class="panel-body">\
                <div class="form-group">\
                  <label for="jawaban-essay-'+val.id+'">Jawaban :</label>\
                  <textarea class="form-control" rows="5" id="jawaban-essay-'+val.id+'"></textarea>\
                </div>\
              </div>\
              <div class="panel-footer">\
                <button data-essay="'+val.id+'" class="btn btn-success kirim-essay">Kirim</button>\
                <label class=label-status-kirim-essay></label>\
              <div>\
            </div>'
          );
        })
        loadExistingAnswer();
      }
    });
  </script>
@endsection

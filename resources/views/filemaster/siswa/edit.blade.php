@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Data Siswa<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Siswa</div>

            <form action="{{ route('siswa.update', $siswas->id) }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="panel-body">
              <div class="form-group">
                  <label class="control-label" for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Anda" value="{{ $siswas->nama }}" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $siswas->tempat_lahir }}" placeholder="Isikan Kota Anda Lahir">
              </div>
              <div class="form-group">
                  <label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswas->tanggal_lahir }}" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="asal_sekolah">Asal Sekolah</label>
                  <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $siswas->asal_sekolah }}" placeholder="Isikan Asal Sekolah Anda">
              </div>
              {{-- Select Option for Agama --}}
              <div class="form-group">
                  <label for="agama_id">Agama</label>
                  <select class="form-control" name="agama_id" id="agama_id" value="{{ $siswas->agamas->deskripsi }}">
                      <option value="" disabled selected>Pilih Agama</option>
                      @foreach ($agamas as $agama)
                          <option value="{{ $agama->id }}">{{ $agama->deskripsi }}</option>
                      @endforeach
                  </select>
              </div>
              {{-- Select option for Pekerjaan --}}
              <div class="form-group">
                  <label for="pekerjaan_id">Pekerjaan</label>
                  <select class="form-control" name="pekerjaan_id" id="pekerjaan_id">
                      <option value="" disabled selected>Pilih Pekerjaan</option>
                      @foreach ($pekerjaans as $pekerjaan)
                          <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->deskripsi }}</option>
                      @endforeach
                  </select>
              </div>
              {{-- Select option for Agama --}}
              <div class="form-group">
                  <label for="kejuruan_id">Kejuruan</label>
                  <select class="form-control" name="kejuruan_id" id="kejuruan_id" >
                      <option value="" disabled selected>Pilih Kejuruan</option>
                      @foreach ($kejuruans as $kejuruan)
                          <option value="{{ $kejuruan->id }}">{{ $kejuruan->deskripsi }}</option>
                      @endforeach
                  </select>
              </div>
              {{-- Select option for status--}}
              <div class="form-group">
                  <label for="status_id">Status</label>
                  <select class="form-control" name="status_id" id="status_id" required>
                      <option value="" disabled selected>Pilih Status</option>
                      @foreach ($statuses as $status)
                          <option value="{{ $status->id }}">{{ $status->deskripsi }}</option>
                      @endforeach
                  </select>
              </div>
              {{-- Select option for Informasi --}}
              <div class="form-group">
                  <label for="informasi_id">Informasi</label>
                  <select class="form-control" name="informasi_id" id="informasi_id" required>
                      <option value="" disabled selected>Pilih Informasi</option>
                      @foreach ($informasis as $informasi)
                          <option value="{{ $informasi->id }}">{{ $informasi->deskripsi }}</option>
                      @endforeach
                  </select>
              </div>
              {{-- Select option for Pendidikan --}}
              <div class="form-group">
                  <label for="pendidikan_id">Pendidikan</label>
                  <select class="form-control" name="pendidikan_id" id="pendidikan_id" required>
                      <option value="" disabled selected>Pilih Pendidikan</option>
                      @foreach ($pendidikans as $pendidikan)
                          <option value="{{ $pendidikan->id }}">{{ $pendidikan->deskripsi }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-danger" href="{{ route('siswa.index') }}">Batal</a>
                <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

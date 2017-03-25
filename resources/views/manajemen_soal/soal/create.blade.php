@extends('layouts.app')

@section('titlepage')
    - Input Soal
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Tambah Data Soal<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Isi Data Soal</div>

            <form action="{{ route('soal.store') }}" method="post">
            <div class="panel-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Anda" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Isikan Kota Anda Lahir">
                </div>
                <div class="form-group">
                    <label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="asal_sekolah">Asal Sekolah</label>
                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Isikan Asalh Sekolah Anda">
                </div>
                
            </div>
            <div class="panel-footer">
              <a class="btn btn-danger" href="{{ route('soal.index') }}">Batal</a>
              <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

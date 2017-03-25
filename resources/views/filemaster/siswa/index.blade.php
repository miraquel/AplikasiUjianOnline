@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Siswa</h1>
    Tambah daftar data Siswa
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Siswa
            <a class="pull-right" href="{{ url('/siswa/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($siswas) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Kejuruan</th>
                    <th>Asal Sekolah</th>
                    <th>Tanggal Input</th>
                    <th>Update Terakhir</th>
                    <th>Admin Input</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($siswas as $siswa)
                    <tr>
                      <td>{{ $siswa->nama }}</td>
                      <td>{{ $siswa->kejuruans->deskripsi }}</td>
                      <td>{{ $siswa->asal_sekolah }}</td>
                      <td>{{ $siswa->created_at }}</td>
                      <td>{{ $siswa->updated_at }}</td>
                      <td>{{ $siswa->users->name }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-primary btn-sm" type="button">@fa(table) Detail</a>
                          <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('siswa.destroy', $siswa->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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
          <div class="panel-footer">
              <strong>Jumlah Siswa : {{ $siswas->count() }}</strong>
          </div>
        </div>
      </div>
    </div>
  @endsection

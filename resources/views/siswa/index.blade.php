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
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('siswa.show', $title = 'Detail', $parameters = $siswa->id, $attributes = [
                              'class' => 'btn btn-primary btn-sm'
                              ]) }}
                          <div class="box-button">
                            {{ link_to_route('siswa.edit', $title = 'Edit', $parameters = $siswa->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {!! Form::open(['method'=>'DELETE', 'action'=>[
                              'SiswaController@destroy', $siswa->id
                              ]]) !!}
                            {!! Form::submit('Delete', ['class'
                                =>'btn btn-danger btn-sm'
                              ]) !!}
                            {!! Form::close() !!}
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

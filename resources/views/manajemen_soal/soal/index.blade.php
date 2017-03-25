@extends('layouts.app')

@section('titlepage')
    - Soal
@endsection

@section('content')
  <div class="container">
    <h1>Soal</h1>
    Tambah daftar data Soal
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Soal
            <a class="pull-right" href="{{ url('/soal/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($soals) > 0)
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
                  @foreach ($soals as $soal)
                    <tr>
                      <td>{{ $soal->nama }}</td>
                      <td>{{ $soal->kejuruans->deskripsi }}</td>
                      <td>{{ $soal->asal_sekolah }}</td>
                      <td>{{ $soal->created_at }}</td>
                      <td>{{ $soal->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('soal.show', $title = 'Detail', $parameters = $soal->id, $attributes = [
                              'class' => 'btn btn-primary btn-sm'
                              ]) }}
                          <div class="box-button">
                            {{ link_to_route('soal.edit', $title = 'Edit', $parameters = $soal->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {!! Form::open(['method'=>'DELETE', 'action'=>[
                              'SoalController@destroy', $soal->id
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
              <strong>Jumlah Soal : {{ $soals->count() }}</strong>
          </div>
        </div>
      </div>
    </div>
  @endsection

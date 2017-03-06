@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Informasi</h1>
    Tambah daftar data Informasi
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Informasi
            <a class="pull-right" href="{{ url('/informasi/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($informasis) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Tanggal Input</th>
                    <th>Update Terakhir</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($informasis as $informasi)
                    <tr>
                      <td>{{ $informasi->deskripsi }}</td>
                      <td>{{ $informasi->created_at }}</td>
                      <td>{{ $informasi->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('informasi.edit', $title = 'Edit', $parameters = $informasi->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {!! Form::open(['method'=>'DELETE', 'action'=>[
                              'InformasiController@destroy', $informasi->id
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
        </div>
      </div>
    </div>
  @endsection

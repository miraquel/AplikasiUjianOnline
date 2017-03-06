@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Kejuruan</h1>
    Tambah daftar data Kejuruan
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Kejuruan
            <a class="pull-right" href="{{ url('/kejuruan/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($kejuruans) > 0)
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
                  @foreach ($kejuruans as $kejuruan)
                    <tr>
                      <td>{{ $kejuruan->deskripsi }}</td>
                      <td>{{ $kejuruan->created_at }}</td>
                      <td>{{ $kejuruan->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('kejuruan.edit', $title = 'Edit', $parameters = $kejuruan->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {!! Form::open(['method'=>'DELETE', 'action'=>[
                              'KejuruanController@destroy', $kejuruan->id
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

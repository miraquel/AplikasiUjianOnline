@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Agama</h1>
    Tambah daftar data Agama
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Agama
            <a class="pull-right" href="{{ url('/agama/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($agamas) > 0)
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
                  @foreach ($agamas as $agama)
                    <tr>
                      <td>{{ $agama->deskripsi }}</td>
                      <td>{{ $agama->created_at }}</td>
                      <td>{{ $agama->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('agama.edit', $title = 'Edit', $parameters = $agama->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {{ Form::open(['method'=>'DELETE', 'action'=>[
                              'AgamaController@destroy', $agama->id
                              ]]) }}
                            {{ Form::submit('Delete', ['class'
                                =>'btn btn-danger btn-sm'
                              ]) }}
                            {{ Form::close() }}
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

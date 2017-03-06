@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Status</h1>
    Tambah daftar data Status
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Status
            <a class="pull-right" href="{{ url('/status/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($statuses) > 0)
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
                  @foreach ($statuses as $status)
                    <tr>
                      <td>{{ $status->deskripsi }}</td>
                      <td>{{ $status->created_at }}</td>
                      <td>{{ $status->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('status.edit', $title = 'Edit', $parameters = $status->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {!! Form::open(['method'=>'DELETE', 'action'=>[
                              'StatusController@destroy', $status->id
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

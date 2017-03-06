@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Role</h1>
    Tambah daftar data Role
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Role
            <a class="pull-right" href="{{ url('/role/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($roles) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Peran</th>
                    <th>Tanggal Input</th>
                    <th>Update Terakhir</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $role)
                    <tr>
                      <td>{{ $role->name }}</td>
                      <td>{{ $role->created_at }}</td>
                      <td>{{ $role->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('role.edit', $title = 'Edit', $parameters = $role->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            {!! Form::open(['method'=>'DELETE', 'action'=>[
                              'RoleController@destroy', $role->id
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

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
                          <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('role.destroy', $role->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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
        </div>
      </div>
    </div>
  @endsection

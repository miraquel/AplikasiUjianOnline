@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>User</h1>
    Tambah daftar data User
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            User
            <a class="pull-right" href="{{ url('/user/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($users) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Deskripsi</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Input</th>
                    <th>Update Terakhir</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->roles->name }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ $user->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm" type="button">@fa(table) Detail</a>
                          <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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

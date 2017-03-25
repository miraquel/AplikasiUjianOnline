@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Detail User</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detail
                        <a class="pull-right" href="{{ route('user.index') }}">Kembali</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-stripped">
                            <tr>
                                <th>Username</th>
                                <td>{{ $users->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $users->email }}</td>
                            </tr>

                            <tr>
                                <th>Roles</th>
                                <td>{{ $users->roles->name }}</td>
                            </tr>

                        </table>
                    </div>
                    <div class="panel-footer">
                        Kasih Tombol Edit
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Pribadi User
                    </div>
                    <div class="panel-body">
                        Data pribadi (List Disini)
                    </div>
                    <div class="panel-footer">
                        Kasih Tombol Edit
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

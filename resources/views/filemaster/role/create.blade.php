@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Tambah Data Role<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Isi Data Role</div>

            <form action="{{ route('role.store') }}" method="post">
            <div class="panel-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="name">Deskripsi</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Contoh : Admin, User">
                </div>
            </div>
            <div class="panel-footer">
              <a class="btn btn-danger" href="{{ route('role.index') }}">Batal</a>
              <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

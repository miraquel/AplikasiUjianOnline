@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Tambah Data Agama<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Isi Data Agama</div>

            <form action="{{ route('agama.store') }}" method="post">
            <div class="panel-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Contoh : Islam, Kristen, Hindu">
                </div>
            </div>
            <div class="panel-footer">
              <a class="btn btn-danger" href="{{ route('agama.index') }}">Batal</a>
              <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

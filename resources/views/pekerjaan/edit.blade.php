@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Data Pekerjaan<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Pekerjaan</div>

            <form action="{{ route('pekerjaan.update', $pekerjaans->id) }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label" for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Contoh : Karyawan, Wiraswasta" value="{{ $pekerjaans->deskripsi }}">
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-danger" href="{{ route('pekerjaan.index') }}">Batal</a>
                <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

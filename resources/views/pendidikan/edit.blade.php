@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Data Pendidikan<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Edit Data Pendidikan</div>

            <form action="{{ route('pendidikan.update', $pendidikans->id) }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label" for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Contoh : SD, SMP, SMA, S1" value="{{ $pendidikans->deskripsi }}">
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-danger" href="{{ route('pendidikan.index') }}">Batal</a>
                <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

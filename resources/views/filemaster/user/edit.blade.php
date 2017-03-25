@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Data User<h1>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Edit Data User</div>

            <form action="{{ route('user.update', $users->id) }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label" for="name">nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Contoh : Abdul Kadir, Al Bahra" value="{{ $users->name }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Contoh : albahra@gmail.com" value="{{ $users->email }}">
                </div>
                <div class="from-group">
                    
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-danger" href="{{ route('user.index') }}">Batal</a>
                <input type="submit" class="btn btn-success pull-right">
            </div>
            </form>
        </div>
    </div>
@endsection

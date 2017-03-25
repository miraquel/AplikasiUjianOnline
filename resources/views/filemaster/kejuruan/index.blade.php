@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Kejuruan</h1>
    Tambah daftar data Kejuruan
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Kejuruan
            <a class="pull-right" href="{{ url('/kejuruan/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($kejuruans) > 0)
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
                  @foreach ($kejuruans as $kejuruan)
                    <tr>
                      <td>{{ $kejuruan->deskripsi }}</td>
                      <td>{{ $kejuruan->created_at }}</td>
                      <td>{{ $kejuruan->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ route('kejuruan.edit', $kejuruan->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('kejuruan.destroy', $kejuruan->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('kejuruan.destroy', $kejuruan->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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

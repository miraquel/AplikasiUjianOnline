@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Informasi</h1>
    Tambah daftar data Informasi
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Informasi
            <a class="pull-right" href="{{ url('/informasi/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($informasis) > 0)
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
                  @foreach ($informasis as $informasi)
                    <tr>
                      <td>{{ $informasi->deskripsi }}</td>
                      <td>{{ $informasi->created_at }}</td>
                      <td>{{ $informasi->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ route('informasi.edit', $informasi->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('informasi.destroy', $informasi->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('informasi.destroy', $informasi->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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

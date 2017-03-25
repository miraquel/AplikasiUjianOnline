@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Pekerjaan</h1>
    Tambah daftar data Pekerjaan
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Pekerjaan
            <a class="pull-right" href="{{ url('/pekerjaan/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($pekerjaans) > 0)
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
                  @foreach ($pekerjaans as $pekerjaan)
                    <tr>
                      <td>{{ $pekerjaan->deskripsi }}</td>
                      <td>{{ $pekerjaan->created_at }}</td>
                      <td>{{ $pekerjaan->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ route('pekerjaan.edit', $pekerjaan->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('pekerjaan.destroy', $pekerjaan->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('pekerjaan.destroy', $pekerjaan->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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

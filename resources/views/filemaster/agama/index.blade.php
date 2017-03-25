@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Agama</h1>
    Tambah daftar data Agama
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Agama
            <a class="pull-right" href="{{ url('/agama/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($agamas) > 0)
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
                  @foreach ($agamas as $agama)
                    <tr>
                      <td>{{ $agama->deskripsi }}</td>
                      <td>{{ $agama->created_at }}</td>
                      <td>{{ $agama->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <a href="{{ route('agama.edit', $agama->id) }}" class="btn btn-warning btn-sm" type="button">@fa(pencil) Edit</a>
                          <div class="box-button">
                            <form action="{{ route('agama.destroy', $agama->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('agama.destroy', $agama->id) }}" class="btn btn-danger btn-sm">@fa(trash) Delete</a>
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

@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Pendidikan</h1>
    Tambah daftar data Pendidikan
    <br>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Pendidikan
            <a class="pull-right" href="{{ url('/pendidikan/create') }}">Input Data Baru</a>
          </div>
          <div class="panel-body">
            @if (count($pendidikans) > 0)
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
                  @foreach ($pendidikans as $pendidikan)
                    <tr>
                      <td>{{ $pendidikan->deskripsi }}</td>
                      <td>{{ $pendidikan->created_at }}</td>
                      <td>{{ $pendidikan->updated_at }}</td>
                      <td>
                        <div class="pull-right">
                          <div class="box-button">
                            {{ link_to_route('pendidikan.edit', $title = 'Edit', $parameters = $pendidikan->id, $attributes = [
                              'class' => 'btn btn-warning btn-sm'
                              ]) }}
                          </div>
                          <div class="box-button">
                            <form action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="post">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <input class="btn btn-danger btn-sm" type="submit" value="Hapus">
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

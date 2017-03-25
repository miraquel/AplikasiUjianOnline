@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label>Halaman Utama</label>
                </div>

                <div class="panel-body">
                    Selamat Datang, {{ Auth::user()->name }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <label>Ujian yang akan berlangsung</label>
                    <label class="pull-right">Tanggal : {{ $today }}, {{ $clock }}</label>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ujian</th>
                                <th>Jurusan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ujians as $key => $ujian)
                                <tr>
                                    <td>{{ $ujian->deskripsi }}</td>
                                    <td>{{ $ujian->kejuruans->deskripsi }}</td>
                                    <td>{{ $ujian->tanggal }}</td>
                                    <td>
                                        @if ($ujian->tanggal > $today)
                                            Belum Dilaksanakan
                                        @elseif ($ujian->tanggal == $today)
                                            Hari Ini
                                        @else
                                            Sudah Dilaksanakan
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Data Pribadi Soal</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Biodata
                        <a class="pull-right" href="{{ route('soal.index') }}">Kembali</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-stripped">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $soals->nama }}</td>
                            </tr>

                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $soals->tempat_lahir }}</td>
                            </tr>

                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $soals->tanggal_lahir }}</td>
                            </tr>

                            <tr>
                                <th>Agama</th>
                                <td>{{ $soals->agamas->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Asal Sekolah</th>
                                <td>{{ $soals->asal_sekolah }}</td>
                            </tr>

                            <tr>
                                <th>Pendidikan</th>
                                <td>{{ $soals->pendidikans->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $soals->pekerjaans->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{ $soals->statuses->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Kejuruan</th>
                                <td>{{ $soals->kejuruans->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Informasi</th>
                                <td>{{ $soals->informasis->deskripsi }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="panel-footer">
                        Kasih Tombol Edit
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Pribadi Soal
                    </div>
                    <div class="panel-body">
                        Data pribadi (List Disini)
                    </div>
                    <div class="panel-footer">
                        Kasih Tombol Edit
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

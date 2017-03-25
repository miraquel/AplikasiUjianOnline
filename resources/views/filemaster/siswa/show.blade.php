@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Data Pribadi Siswa</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Biodata
                        <a class="pull-right" href="{{ route('siswa.index') }}">Kembali</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-stripped">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $siswas->nama }}</td>
                            </tr>

                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $siswas->tempat_lahir }}</td>
                            </tr>

                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $siswas->tanggal_lahir }}</td>
                            </tr>

                            <tr>
                                <th>Agama</th>
                                <td>{{ $siswas->agamas->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Asal Sekolah</th>
                                <td>{{ $siswas->asal_sekolah }}</td>
                            </tr>

                            <tr>
                                <th>Pendidikan</th>
                                <td>{{ $siswas->pendidikans->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $siswas->pekerjaans->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{ $siswas->statuses->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Kejuruan</th>
                                <td>{{ $siswas->kejuruans->deskripsi }}</td>
                            </tr>

                            <tr>
                                <th>Informasi</th>
                                <td>{{ $siswas->informasis->deskripsi }}</td>
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
                        Data Pribadi Siswa
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

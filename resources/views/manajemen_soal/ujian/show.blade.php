@extends('layouts.app')

@section('titlepage')
     - Detail Ujian
@endsection

@section('content')
    <div class="container">
        <h3>Detail {{ $ujians->deskripsi }}</h3>
        <h4>{{ $ujians->kejuruans->deskripsi }}</h4>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Daftar
            </div>
            <div class="panel-body">
                @if (count($soals) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Soal</th>
                                <th>Pertanyaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soals as $key => $soal)
                              <tr>
                                  <td>{{ ++$key }}</td>
                                  <td>
                                      {{ $soal->deskripsi }}
                                      <ol type="a">
                                        @php
                                            $increment = 0;
                                        @endphp

                                        @foreach ($pilihans as $key => $pilihan)
                                            @if ($pilihan->soal_id == $soal->id)
                                                <li><label style="color:green">{{ $pilihan->deskripsi }}</label></li>
                                                @php
                                                    ++$increment;
                                                @endphp
                                            @endif
                                        @endforeach
                                      </ol>
                                      @if ($increment < 1)
                                          <label style="color:red">Belum ada pilihan jawaban, silahkan isi terlebih dahulu</label>
                                      @endif
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    Data soal kosong, Input terlebih dahulu
                @endif
            </div>
        </div>
    </div>
@endsection

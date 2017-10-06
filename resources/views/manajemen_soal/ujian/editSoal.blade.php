@extends('layouts.app')

@section('titlepage')
     - Edit Soal
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Soal Siswa</h1>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                {{ $ujians->deskripsi }}
                <div class="pull-right">
                    {{ $ujians->kejuruans->deskripsi }}
                </div>
            </div>
            <div class="panel-body">
                <h4>Tambahkan soal pilihan ganda yang ingin diujikan</h4>
                <form class="form-horizontal" action="{{ route('soal.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="ujian_id" value="{{ $ujians->id }}">
                    <div class="form-group">
                        <label class="control-label col-md-1" for="deskripsi">Pertanyaan</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Tuliskan pertanyaan dari soal disini">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success pull-left">@fa(paper-plane) Simpan</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. Soal</th>
                            <th>Pertanyaan</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                          $incrementNoSoal = $soals->count()+1;
                        @endphp
                        @foreach ($soals as $key => $soal)
                            <tr data-toggle="collapse" data-target="#demo_{{ $key+1 }}">
                                <td>{{ $incrementNoSoal-1 }}</td>
                                <td>{{ $soal->deskripsi }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="collapse" data-target="#demo_{{ $key+1 }}">Pilihan Ganda</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="collapse" id="demo_{{ $key+1 }}">
                                        <div class="row">
                                            <form class="horizontal-form" action="{{ route('pilihan.store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="soal_id" value="{{ $soal->id }}">
                                                <div class="form-group">
                                                    <label class="control-label col-md-1" for="deskripsi">Jawaban</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Tuliskan Jawaban dari soal disini">
                                                    </div>
                                                    <div class="col-md-2 pull-center">
                                                        <label class="checkbox-inline" for="benar">
                                                            <input type="hidden" name="benar" id="benar" value="0">
                                                            <input type="checkbox" name="benar" id="benar" value="1">
                                                            Benar ?
                                                        </label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="submit" class="btn btn-success pull-left">@fa(paper-plane) Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                Jawaban
                                            </div>
                                            <div class="panel-body">
                                                <ol class="list-jawaban" type="a">
                                                  @php
                                                      $increment = 0;
                                                  @endphp

                                                  @foreach ($pilihans as $key => $pilihan)
                                                      @if ($pilihan->soal_id == $soal->id)
                                                          <div class="row">
                                                              <div class="col-md-1">
                                                                  <form class="no-break-line" action="{{ route('pilihan.destroy', $pilihan->id) }}" method="post">
                                                                      <input type="hidden" name="_method" value="DELETE">
                                                                      {{ csrf_field() }}
                                                                      <button type="sumbit" class="btn btn-danger btn-xs pull-right">@fa(times)</button>
                                                                  </form>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <li class="no-break-line">
                                                                    <label
                                                                        @if ($pilihan->benar == 1)
                                                                            style="color:green"
                                                                        @endif
                                                                    >
                                                                        {{ $pilihan->deskripsi }}
                                                                    </label>
                                                                    @if ($pilihan->benar == 1)
                                                                        <label>@fa(check)</label>
                                                                    @endif
                                                                </li>
                                                              </div>
                                                          </div>
                                                          @php
                                                              ++$increment;
                                                          @endphp
                                                      @endif
                                                  @endforeach
                                                </ol>
                                                @if ($increment < 1)
                                                    <label>Belum ada pilihan jawaban, silahkan isi terlebih dahulu</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            Soal Essay
          </div>
          <div class="panel-body">
            <h4>Tambahkan soal Essay yang ingin diujikan</h4>
            <form class="form-horizontal" action="{{ route('soal_essay.store') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="ujian_id" value="{{ $ujians->id }}">
                <div class="form-group">
                    <label class="control-label col-md-1" for="deskripsi">Pertanyaan</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Tuliskan pertanyaan dari soal disini">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success pull-left">@fa(paper-plane) Simpan</button>
                    </div>
                </div>
            </form>
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th class="text-center">No. Soal</th>
                  <th>Pertanyaan</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($soalEssays as $key => $soalEssay)
                  <tr>
                    <td class="col-md-1 text-center">{{ $key+1 }}</td>
                    <td>{{ $soalEssay->deskripsi }}</td>
                    <td class="col-md-2">
                      <div class="box-button">
                        <form action="{{ route('soal_essay.destroy', $soalEssay->id) }}" method="post">
                          <input type="hidden" name="ujian_id" value="{{ $ujians->id }}">
                          <input type="hidden" name="_method" value="DELETE">
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                      <a href="{{ route('soal_essay.edit', $soalEssay->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection

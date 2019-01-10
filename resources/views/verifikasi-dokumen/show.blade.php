@extends('layouts.gentellela')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Resume Pendaftaran</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                    <form action="{{ route('pendaftaran.store') }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-app">
                            <i class="fa fa-save"></i> Submit Pendaftaran
                        </button>
                    </form>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Informasi Pendaftaran</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="informasi_pendaftaran" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Jalur Pendaftaran</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="jalur" class="form-control" value="{{ $pendaftaran->jalur_label }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tanggal Mendaftar</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tanggal" class="form-control" value="{{ $pendaftaran->created_at }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Institusi</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tanggal" class="form-control" value="{{ $pendaftaran->minstitusi->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Jurusan 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tanggal" class="form-control" value="{{ $pendaftaran->jurusan_1_label }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Jurusan 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tanggal" class="form-control" value="{{ $pendaftaran->jurusan_2_label }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="status" class="form-control" value="{{ ucwords(str_replace('_', ' ', $pendaftaran->state)) }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea id="keterangan" class="form-control" readonly>@if($cek_sistem_false > 0)Terdapat persyaratan yang tidak memenuhi verifikasi sistem, mohon periksa kembali data di bawah ini @endif</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#tab_biodata" id="status-tab" role="tab" data-toggle="tab" aria-expanded="true">Biodata Siswa</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#tab_dokumen" role="tab" id="info-tab" data-toggle="tab" aria-expanded="false">Daftar Dokumen</a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#tab_prestasi" role="tab" id="info-tab" data-toggle="tab" aria-expanded="false">Daftar Prestasi</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_biodata" aria-labelledby="status-tab">
                                        @foreach($biodata as $key => $value)
                                            <div class="form-group row">
                                                <label for="noreg" class="col-md-2 col-form-label text-md-right">{{ ucwords(str_replace("_", " ", $value->key)) }}</label>
                                                <div class="col-md-8">
                                                    @if($value->key == 'ktp' || $value->key == 'ijazah' || $value->key == 'sk_sehat' || $value->key == 'sk_tidak_hamil' || $value->key == 'foto')
                                                        <a href="{{ route('viewfile') . '?file=' . $value->value }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                                    @elseif($value->key == 'tipe_sekolah')
                                                        @php $tipe_sekolah = $value->value; @endphp
                                                        <input id="noreg" type="text" class="form-control" value="{{ config("pendidikan.tipe_sekolah.$value->value.label") }}" readonly>
                                                    @elseif($value->key == 'jurusan')
                                                        <input id="noreg" type="text" class="form-control" value="{{ config("pendidikan.jurusan.$tipe_sekolah.$value->value.label") }}" readonly>
                                                    @else
                                                        <input id="noreg" type="text" class="form-control" value="{{ $value->value }}" readonly>
                                                    @endif
                                                    {{ $value->keterangan }}
                                                </div>
                                                <div class="col-md-1">
                                                    @if($value->cek_sistem)
                                                        <span class="btn btn-success"><i class="fa fa-check-circle"></i></span>
                                                    @else
                                                        <span class="btn btn-danger"><i class="fa fa-times-circle"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_dokumen" aria-labelledby="dokumen-tab">
                                        @foreach($dokumen as $key => $value)
                                            <div class="form-group row">
                                                <label for="noreg" class="col-md-2 col-form-label text-md-right">{{ ucwords(str_replace("_", " ", $value->key)) }}</label>
                                                <div class="col-md-8">
                                                    @if(str_contains($value->key, 'rata_rata'))
                                                        <input id="noreg" type="text" class="form-control" value="{{ $value->value }}" readonly>
                                                        {{ $value->keterangan }}
                                                    @else
                                                        <a href="{{ route('viewfile') . '?file=' . $value->value }}" target="_blank" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                                    @endif
                                                </div>
                                                <div class="col-md-1">
                                                    @if($value->cek_sistem)
                                                        <span class="btn btn-success"><i class="fa fa-check-circle"></i></span>
                                                    @else
                                                        <span class="btn btn-danger"><i class="fa fa-times-circle"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_prestasi" aria-labelledby="info-tab">
                                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tahun</th>
                                                <th>Tingkat</th>
                                                <th>Kepesertaan</th>
                                                <th>Prestasi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $prestasi as $key => $value )
                                                <tr>
                                                    <td>{{ $value->nama }}</td>
                                                    <td>{{ $value->tahun }}</td>
                                                    <td>{{ $value->tingkat }}</td>
                                                    <td>{{ $value->kepesertaan }}</td>
                                                    <td>{{ $value->prestasi }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
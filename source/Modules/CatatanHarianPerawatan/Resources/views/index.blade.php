@extends('layouttemplate::master')

@section('title')
    Catatan Harian Perawatan Pasien
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs small">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perjalanan_penyakit.index', $pasien->id) }}">Perjalanan Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perintah_dokter_dan_pengobatan.index', $pasien->id) }}">Perintah Dokter dan Pengobatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('catatan_harian_perawatan.index', $pasien->id) }}">Catatan Harian dan Perawatan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="page-header">
                        @if(Auth::user()->jabatan_id == 3)
                            <div class="float-right"><a href="{{ route('catatan_harian_perawatan.create', $pasien->id) }}" class="btn btn-outline-primary">Tambah Catatan Baru</a></div>
                        @endif
                        <h4>Catatan Harian Perawatan: {{ $pasien->nama }}</h4>
                        <hr>
                        <div class="col-md-12">
                            <table>
                                <tbody class="small">
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td style="padding-left: 10px">: {{ ucfirst($pasien->jenkel) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Umur</th>
                                        <td id="umur" style="padding-left: 10px"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Masuk</th>
                                        <td style="padding-left: 10px">: {{ date("d F Y", strtotime($tanggal_masuk)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diagnosa Awal</th>
                                        <td style="padding-left: 10px">: {{ ucfirst($diagnosa_awal) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <table class="table table-striped small">
                        <thead>
                            <tr>
                                <th>Asuhan Keperawatan (SOAP)</th>
                                <th>Pengisi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($catatans as $catatan)
                            <tr>
                                <td class="text-justify w-75">
                                    <b>Dibuat tanggal: {{ date("d F Y", strtotime($catatan->tanggal_keterangan)) }} – {{ $catatan->jam }}</b><br>
                                    @if(date("d F Y", strtotime($catatan->tanggal_keterangan)) == date("d F Y", strtotime($catatan->updated_at)))
                                        <b>Diubah tanggal: –</b>
                                    @else
                                        <b>Diubah tanggal: {{ date("d F Y", strtotime($catatan->updated_at)) }}</b>
                                    @endif
                                    <hr>
                                    <p>{!! $catatan->asuhan_keperawatan_soap !!}</p>
                                </td>
                                <td class="text-justify">{{ $catatan->user->nama }}</td>
                                @if(Auth::user()->jabatan_id == 3 && Auth::user()->id == $catatan->id_petugas)
                                    <td><a href="{{ route('catatan_harian_perawatan.edit', [$catatan->id_pasien, $catatan->id]) }}" class="btn btn-warning">Ubah</a></td>
                                    @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        var lahir = new Date($('#tanggal_lahir').text());
        var sekarang = new Date();
        var tahun_sekarang = sekarang.getFullYear();
        var tahun_lahir = lahir.getFullYear();
        var umur = tahun_sekarang - tahun_lahir;
        $('#umur').append(": " + umur + " Tahun");
    </script>
    @include('layouttemplate::attributes.pasien_ranap')
@endsection
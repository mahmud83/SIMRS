@extends('layouttemplate::master')

@section('title')
    Perintah Dokter dan Pengobatan Pasien
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-body">
            <div class="col-md-12">
                <div class="page-header">
                    <div class="float-right"><a href="{{ route('perintah_dokter_dan_pengobatan.create', $pasien->id) }}" class="btn btn-outline-primary">Tambah Catatan Baru</a></div>
                    <h4>Perintah Dokter dan Pengobatan: {{ $pasien->nama }}</h4>
                    <hr>
                    <div class="col-md-12">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td style="padding-left: 10px">: {{ ucfirst($pasien->jenkel) }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td id="umur" style="padding-left: 10px"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <p id="tanggal_lahir" hidden>{{ $pasien->tanggal_lahir }}</p>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Terapi dan Rencana Tindakan</th>
                            <th>Catatan Perawat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perintahs as $perintah)
                            <tr>
                                <td>{{ date("d F Y", strtotime($perintah->tanggal_keterangan)) }}</td>
                                <td class="text-justify">{{ $perintah->terapi_dan_rencana_tindakan }}</td>
                                <td class="text-justify">{{ $perintah->catatan_perawat }}</td>
                                <td><a href="{{ route('perjalanan_penyakit.edit', [$perintah->id_pasien, $perintah->id]) }}" class="btn btn-outline-warning">Ubah</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
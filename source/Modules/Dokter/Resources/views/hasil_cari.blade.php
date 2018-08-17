@extends('layouttemplate::master')

@section('title')
    Hasil Pencarian: {{ $query }}
    @endsection

@section('content')
    <div class="col-md-12">
        <div class="d-none d-sm-block">
            <div class="card card-body">
                <div class="col-md-12">
                    <form class="form-inline" action="{{ route('dokter.cari') }}" method="get">
                        <label for="cari" class="control-label">Cari Dokter: </label>
                        &nbsp;&nbsp;
                        <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                        &nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari Dokter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="d-none d-sm-block card card-body">
            <div class="page-header">
                <h3>Hasil pencarian untuk: {{ ucwords($query) }}</h3>
                <br>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dokters as $dokter)
                    <tr>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->alamat }}</td>
                        <td>{{ $dokter->telepon }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('dokter.show', ['id' => $dokter->id]) }}" class="btn btn-outline-info">Detail...</a>
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('dokter.edit', ['id' => $dokter->id]) }}">Ubah</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

@section('content-mobile')
    <div class="d-block d-sm-none">
        <div class="card card-body">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('dokter.cari') }}" method="get">
                    <label for="cari" class="control-label">Cari Dokter: </label>
                    <input type="text" class="form-control" id="query" name="query" placeholder="John Doe" value="{{ $query }}">
                    <br><br><br>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari Dokter</button>
                </form>
            </div>
        </div>
    </div>
    <div class="d-block d-sm-none">
        <div class="card card-body">
            <div class="page-header">
                <h3>Hasil pencarian untuk: {{ ucwords($query) }}</h3>
                <br>
            </div>
            <table class="table small">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dokters as $dokter)
                    <tr>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->telepon }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('dokter.show', ['id' => $dokter->id]) }}" class="btn btn-sm btn-outline-info">Detail...</a>
                                <button type="button" class="btn btn-sm btn-outline-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('dokter.edit', ['id' => $dokter->id]) }}">Ubah</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection
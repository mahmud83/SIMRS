@extends('layouttemplate::master')

@section('title')
    Detail Dokter
    @endsection

@section('content')
    <div class="card card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Dokter: {{ $dokter->nama }}</h2>
                </div>
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $dokter->id }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $dokter->telepon }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $dokter->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning float-left">Ubah Data</a>
            </div>
        </div>
    </div>
    @endsection

@section('content-mobile')
    <div class="d-block d-sm-none">
        <div class="card">
            <div class="card-body">
                <div class="page-header">
                    <h2>Dokter: {{ $dokter->nama }}</h2>
                </div>
                <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $dokter->id }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $dokter->telepon }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $dokter->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning float-left">Ubah Data</a>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    @include('layouttemplate::attributes.dokter')
    @endsection
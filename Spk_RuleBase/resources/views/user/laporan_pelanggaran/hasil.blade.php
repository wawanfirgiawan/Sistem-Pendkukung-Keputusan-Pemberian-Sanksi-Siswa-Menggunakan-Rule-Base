@extends('backend.master')

@section('tittle-header')
    <h1>Laporan Pelanggaran</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <i class="far fa-lightbulb"></i>
                <button class="close" data-dismiss="alert">
                <span>×</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
    @endif
<div class="card mx-auto" style="width: 90%;" >
    <div class="card-body">
        <div class="section-title mt-0">Data Laporan Pelanggaran</div>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th width="25%">Nama Siswa </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->nama_siswa }}</td>
                </tr>
                <tr>
                    <th width="25%">Kelas </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <th width="25%">Pelanggaran </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->pelanggaran }}</td>
                </tr>
                <tr>
                    <th width="25%">Keterangan </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->keterangan }}</td>
                </tr>
                </tbody>
        </table>
        <a href="{{ route('lappel-create') }}" class="btn btn-info">+ Tambah Laporan Lain</a>
    </div>
</div>
@endsection

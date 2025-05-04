@extends('backend.master')

@section('tittle-header')
    <h1>Riwayat Pelanggaran</h1>
@endsection
@section('content')
        <div class="card">
            <div class="card-body">
                @if (Auth::user()->role == "siswa")
                <div class="section-title mt-0">Data Riwayat Pelanggaran, <i>{{auth()->user()->name}}</i></div>
                @endif
                @if (Auth::user()->role == "ortu")
                    <div class="section-title mt-0">Data Riwayat Pelanggaran, <i>{{ $nama_siswa->siswa }}</i></div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Riwayat</th>
                            <th scope="col">Nama siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Kode Pelanggaran</th>
                            <th scope="col">Pelanggaran</th>
                        </tr>
                    </thead>
                        @if ($riwayats->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada riwayat pelanggaran.</td>
                        </tr>
                        @else
                        @foreach ($riwayats as $key => $item)
                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                <td>{{ $item->kode_riwayat }}</td>
                                <td>{{ $item->siswa }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->kode_tatib }}</td>
                                <td>{{ $item->nama_tatib }}</td>
                            </tr>
                        @endforeach
                        @endif
                </table>
            </div>
        </div>
@endsection
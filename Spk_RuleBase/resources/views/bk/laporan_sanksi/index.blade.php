@extends('backend.master')

@section('tittle-header')
    <h1>Laporan Sanksi</h1>
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
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Data Laporan Sanksi
                    @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "bk" || Auth::user()->role == "kepsek")
                    <form class="form-inline float-right mb-2">
                        <a href="{{ route('pdf-dataLaporanSanksi') }}" class="btn btn-icon btn-info mr-2">PDF Data Laporan Sanksi <i class="fas fa-print"></i></a>
                        <div class="search-element">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" value="{{ Request::get('siswa_id') }}" name="siswa_id">
                          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                          <div class="search-backdrop"></div>
                        </div>
                    </form>
                    @endif
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Daftar Pelanggaran</th>
                            <th scope="col">Sanksi</th>
                            @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "bk" )
                            <th scope="col">Aksi</th>
                            @endif
                            @if (Auth::user()->role == "ortu" || Auth::user()->role == "kepsek" )
                            <th scope="col">Cetak PDF</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "bk")
                        @foreach ($laporan as $key => $item)
                        <tr align="center">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->pelanggaran }}</td>
                            <td>{{ $item->sanksi }}</td>
                            <td>
                                <a href="{{ route('laporan_sanksi-pdf', $item->id) }}" class="btn btn-icon btn-info"><i class="fas fa-print"></i></a>
                                <form action="{{ route('laporan_sanksi-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-icon btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @if (Auth::user()->role == "kepsek")
                        @foreach ($laporan as $key => $item)
                        <tr align="center">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->pelanggaran }}</td>
                            <td>{{ $item->sanksi }}</td>
                            <td>
                                <a href="{{ route('laporan_sanksi-pdf', $item->id) }}" class="btn btn-icon btn-info"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @if (Auth::user()->role == "ortu")
                        @foreach ($laporan_anak as $key => $item)
                        <tr align="center">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->pelanggaran }}</td>
                            <td>{{ $item->sanksi }}</td>
                            <td>
                                <a href="{{ route('laporan_sanksi-pdf', $item->id) }}" class="btn btn-icon btn-info"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{-- tag menambahkan pagination --}}
                                            <div class="mt-2 float-right">
                                                {{ $laporan->links('vendor.pagination.bootstrap-4') }}
                                            </div>
            </div>
            </div>
        </div>
@endsection
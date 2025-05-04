@extends('backend.master')

@section('tittle-header')
    <h1>Siswa</h1>
@endsection
@section('content')
<div class="row">
    @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "operator")
    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Data Siswa</div>
                <form action="{{ route('siswa-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Nis</label>
                        <input type="text" class="form-control" name="nis">
                        @error('nis')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama">
                        @error('nama')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select class="form-control form-control-sm" name="jenis_kelamin">
                                <option value="LAKI-LAKI">Laki - Laki</option>
                                <option value="PEREMPUAN">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                            @error('alamat')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kelas</label>
                            <select class="form-control form-control-sm" name="kelas_id">
                                @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
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
    </div>
    @endif
    <div class="col-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Data Siswa

                    <form class="form-inline float-right mb-2">
                        <div class="search-element">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" value="{{ Request::get('nama') }}" name="nama">
                          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                          <div class="search-backdrop"></div>
                        </div>
                      </form>

                </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Alamat</th>
                                @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "operator")
                                <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($siswa as $key => $item)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td>
                                <td>{{ $item->alamat }}</td>
                                @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "operator")
                                <td>
                                    {{-- <a href="#" class="btn btn-icon btn-info"><i class="fas fa-times"></i></a> --}}
                                    <form action="{{ route('siswa-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-icon btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                            {{-- tag menambahkan pagination --}}
                <div class="mt-2 float-right">
                    {{ $siswa->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
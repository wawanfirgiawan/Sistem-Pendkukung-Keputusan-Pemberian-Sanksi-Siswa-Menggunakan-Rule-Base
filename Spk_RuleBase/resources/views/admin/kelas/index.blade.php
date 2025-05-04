@extends('backend.master')

@section('tittle-header')
    <h1>Kelas</h1>
@endsection

@section('content')
<div class="row">
    @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "operator")
    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Data Kelas</div>
                <form action="{{ route('kelas-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Kode Kelas</label>
                        <input type="text" class="form-control" name="kode_kelas">
                        @error('kode_kelas')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas">
                        @error('nama_kelas')
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
                <div class="section-title mt-0">Data Kelas

                    <form class="form-inline float-right mb-2">
                        <div class="search-element">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" value="{{ Request::get('nama_kelas') }}" name="nama_kelas">
                          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                          <div class="search-backdrop"></div>
                        </div>
                      </form>

                </div>

                

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Kelas</th>
                            <th scope="col">Nama Kelas</th>
                            @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "operator")
                                <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $key => $item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->kode_kelas }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            @if (Auth::user()->role == "superAdmin" || Auth::user()->role == "operator")
                            <td>
                                {{-- <a href="#" class="btn btn-icon btn-info"><i class="fas fa-times"></i></a> --}}
                                <form action="{{ route('kelas-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
                                                {{ $kelas->links('vendor.pagination.bootstrap-4') }}
                                            </div>
            </div>
        </div>
    </div>
</div>
@endsection
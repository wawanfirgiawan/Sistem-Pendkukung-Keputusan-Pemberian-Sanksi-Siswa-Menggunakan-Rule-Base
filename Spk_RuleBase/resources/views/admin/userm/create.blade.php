@extends('backend.master')

@section('addselect')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('tittle-header')
<h1>Tambah User</h1>
@endsection

@section('content')




<div class="row">
    <div class="col-12 col-md-5 col-lg-5">
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
                <div class="section-title mt-0">Tambah User</div>
                <form action="{{ route('user-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control" name="email" @error('email') is-invalid @enderror >
                            @error('email')
                                <span class="text-danger">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Role</label>
                            {{-- <input type="text" class="form-control" name="role"> --}}
                            <select name="role" class="form-control">
                                    <option value="operator">Operator Sekolah</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                    <option value="bk">Pihak BK</option>
                                    <option value="ortu">Orang Tua Siswa</option>
                                    <option value="kepsek">Kepala Sekolah</option>
                            </select>
                            @error('role')
                                <span class="text-danger">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Siswa</label>
                            <select name="siswa_id" id="siswa_id" class="form-control select2">
                                @foreach($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }} - {{ $siswa->nis }}</option>
                                @endforeach
                            </select>
                            @error('siswa_id')
                                <span class="text-danger">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5>Submit Registrasi</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.approve', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Setujui</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Data Siswa

                    <form class="form-inline float-right mb-2">
                        <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" value="{{ Request::get('name') }}" name="name">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            <div class="search-backdrop"></div>
                        </div>
                    </form>

                </div>
                    {{-- <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($user as $key => $item)
                            <tr>
                                <th scope="row">{{ (int) $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <form action="{{ route('user-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-icon btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                {{-- <div class="mt-2 float-right">
                    {{ $user->links('vendor.pagination.bootstrap-4') }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('addscript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
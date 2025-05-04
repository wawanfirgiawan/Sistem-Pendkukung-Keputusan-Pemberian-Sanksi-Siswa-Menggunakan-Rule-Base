@extends('backend.master')

@section('addselect')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('tittle-header')
<h1>Riwayat Pelanggaran</h1>
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
                <div class="section-title mt-0">Tambah Riwayat Pelanggaran</div>
                <form action="{{ route('riwayat-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Tanggal Laporan</label>
                        <input type="date" class="form-control" name="tanggal_laporan">
                        @error('tanggal_laporan')
                            <span class="text-danger">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label>Nama Siswa</label>
                        <select class="form-control form-control-sm" id="selectSiswa" name="siswa_id"></select>
                        @error('siswa_id')
                            <span class="text-danger">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Pilih Item Pelanggaran</label>
                        <select class="form-control form-control-sm" id="selectTatib" name="tatib_id">
                        </select>
                        @error('tatib_id')
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
    <div class="col-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Data Riwayat Pelanggaran

                    <form class="form-inline float-right mb-2">
                        <div class="search-element">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" value="{{ Request::get('siswa_id') }}" name="siswa_id">
                          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                          <div class="search-backdrop"></div>
                        </div>
                      </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jumlah Riwayat Pelanggaran</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $key => $item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->siswa }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->jumlah_pelanggaran }}</td>
                            <td align="center">
                                <a class="btn btn-icon btn-success" href="{{ route('riwayat-detail', ['siswa_id' => $item->siswa_id, 'id' => $item->siswa_id]) }}" ><i class="fas fa-info-circle"></i></a>
                                {{-- <a class="btn btn-primary" href="" ><i class="fa fa-lg fa-edit"></i></a>
                                <form action="" method="post" style="display: inline" class="form-check-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                                            {{-- tag menambahkan pagination --}}
                                            <div class="mt-2 float-right">
                                                {{ $riwayat->links('vendor.pagination.bootstrap-4') }}
                                            </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('addscript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {

    $("#selectSiswa").select2({
                placeholder:'PILIH SISWA',
                ajax: {
                    url: "{{route('selectsiswa')}}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
});

$(document).ready(function() {

$("#selectTatib").select2({
            placeholder:'PILIH PELANGGARAN',
            ajax: {
                url: "{{route('selecttatib')}}",
                processResults: function({data}){
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.item_tatib
                            }
                        })
                    }
                }
            }
        });
});
</script>
@endsection
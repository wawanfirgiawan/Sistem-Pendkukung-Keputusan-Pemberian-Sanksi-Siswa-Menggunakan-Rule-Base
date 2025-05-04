@extends('backend.master')

@section('addselect')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('tittle-header')
<h1>Lapor Pelanggaran</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="alert alert-primary">
            <i class="far fa-lightbulb"></i>
            Form Keterangan diisi dengan keterangan yang bisa memperkuat laporan, contoh : Kronologi pelanggaran, tempat kejadian, dsb.
          </div>
        <div class="section-title mt-0">Lapor Pelanggaran</div>
        <form action="{{ route('lappel-store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa">
                    @error('nama_siswa')
                        <span class="text-danger">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control select2">
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas_siswa as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <span class="text-danger">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Pelanggaran</label>
                    <input type="text" class="form-control" name="pelanggaran">
                    @error('pelanggaran')
                        <span class="text-danger">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Keterangan</label>
                    <textarea type="text-area" class="form-control" name="keterangan"></textarea>
                    @error('keterangan')
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
@endsection
@section('addscript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
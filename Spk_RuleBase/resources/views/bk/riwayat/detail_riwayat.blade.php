@extends('backend.master')

@section('tittle-header')
    <h1>Detail Riwayat Pelanggaran</h1>
@endsection
@section('addselect')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-7 col-lg-7">
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
                <div class="section-title mt-0">Data Siswa</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Riwayat</th>
                            <th scope="col">Nama siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Kode Pelanggaran</th>
                            <th scope="col">Pelanggaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayats as $key => $item)
                            <tr>
                            <td scope="row" >{{ $key+1 }}</td>
                            <td >{{ $item->kode_riwayat }}</td>
                            <td >{{ $item->siswa }}</td>
                            <td >{{ $item->kelas }}</td>
                            <td >{{ $item->kode_tatib }}</td>
                            <td >{{ $item->nama_tatib }}</td>
                            <td >
                                <form action="{{ route('riwayat-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="btn btn-success">Proses Sanksi</div> --}}
                <form action="{{ route('akumulasi', ['siswa_id' => $siswa->id]) }}" method="post" style="display: inline" class="form-check-inline">
                    @csrf
                    <button class="btn btn-success" type="submit">Proses Akumulasi</button>
                </form>
                
            </div>
        </div>

        @if(session('akumulasi'))
    <div class="card">
        <div class="card-body">
            <h5>Akumulasi Pelanggaran</h5>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" width="25%">Jumlah Pelanggaran</th>
                        <th scope="col" width="75%">Klasifikasi pelanggaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $riwayat = session('riwayat', []); // Ambil data dari session
                    @endphp
                    @forelse ($riwayat as $key => $item)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $item->jumlah_pelanggaran }} X {{ $item->kode_tatib }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Tidak ada pelanggaran yang tercatat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <form action="{{ route('postSanksi',['siswa_id' => $siswa->id]) }}" method="post" style="display: inline" class="form-check-inline">
                @csrf
                <button class="btn btn-success" type="submit">Proses Sanksi</button>
            </form>
        </div> 
    </div>
@endif

    </div>
    <div class="col-12 col-md-5 col-lg-5">
        @if(session('newLaporan'))
        <div class="alert alert-primary alert-dismissible show fade">
            <div class="alert-body">
                <i class="far fa-lightbulb"></i>
                <button class="close" data-dismiss="alert">
                <span>×</span>
                </button>
                {{ session('newLaporan') }}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
              <div class="section-title mt-0">Hasil Laporan Sanksi</div>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th width="25%">Nama Siswa </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->siswa }}</td>
                </tr>
                <tr>
                    <th width="25%">Kelas </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->kelas }}</td>
                </tr>
                <tr>
                    <th width="25%">Item Pelanggaran </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->daftar_pelanggaran }}</td>
                </tr>
                <tr>
                    <th width="25%">Sanksi </th>
                    <td width="5%">:</td>
                    <td width="70%">{{ $laporan->sanksi }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        @endif

        @if(session('newRule'))
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <i class="fas fa-exclamation-triangle"></i>
                <button class="close" data-dismiss="alert">
                <span>×</span>
                </button>
                {{ session('newRule') }}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Aturan Sanksi</div>
                <form action="{{ route('rule-store') }}" method="POST">
                    @csrf
                    <div id="rule-container">
                        <div class="rule-group d-flex align-items-center mt-2">
                            <select name="rule[0][kode]" class="form-control select2 mr-2">
                                @foreach($tatibs as $tatib)
                                    <option value="{{ $tatib->kode_tatib }}">{{ $tatib->kode_tatib }} - {{ $tatib->item_tatib }}</option>
                                @endforeach
                            </select>
                            <select name="rule[0][operator]" class="form-control mr-2">
                                <option > Operator</option>
                                <option value="<=">≤</option>
                                <option value=">=">≥</option>
                            </select>
                            <input type="number" name="rule[0][batas]" class="form-control mr-2" placeholder="Batas">
                            <input type="number" name="rule[0][max_batas]" class="form-control mr-2" placeholder="Max Batas (Opsional)">
                            <button type="button" class="btn btn-danger remove-rule">Hapus</button>
                        </div>
                    </div>
    
                    <!-- Tambahkan dropdown untuk memilih ID Sanksi -->
                    <div class="form-group mt-3">
                        <label for="id_sanksi">Pilih Sanksi</label>
                        <select name="id_sanksi" class="form-control select2">
                            @foreach($sanksis as $sanksi)
                                <option value="{{ $sanksi->id }}">{{ $sanksi->kode_sanksi }} - {{ $sanksi->item_sanksi }}</option>
                            @endforeach
                        </select>
                        @error('id_sanksi')
                            <span class="text-danger">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <button type="button" id="add-rule" class="btn btn-success mt-1">Tambah Aturan</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        @endif
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
    let ruleIndex = 1;

    document.getElementById("add-rule").addEventListener("click", function() {
        let container = document.getElementById("rule-container");

        let newRule = document.createElement("div");
        newRule.classList.add("rule-group", "d-flex", "align-items-center", "mt-2");
        newRule.innerHTML = `
            <select name="rule[${ruleIndex}][kode]" class="form-control select2 mr-2">
                @foreach($tatibs as $tatib)
                    <option value="{{ $tatib->kode_tatib }}">{{ $tatib->kode_tatib }} - {{ $tatib->item_tatib }}</option>
                @endforeach
            </select>
            <select name="rule[${ruleIndex}][operator]" class="form-control mr-2">
                <option value="<=">≤</option>
                <option value=">=">≥</option>
            </select>
            <input type="number" name="rule[${ruleIndex}][batas]" class="form-control mr-2" placeholder="Batas">
            <input type="number" name="rule[${ruleIndex}][max_batas]" class="form-control mr-2" placeholder="Max Batas (Opsional)">
            <button type="button" class="btn btn-danger remove-rule">Hapus</button>
        `;

        container.appendChild(newRule);
        $('.select2').select2(); // Re-inisialisasi Select2 setelah elemen baru ditambahkan
        ruleIndex++;
    });

    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("remove-rule")) {
            event.target.parentElement.remove();
        }
    });

});

</script>
@endsection
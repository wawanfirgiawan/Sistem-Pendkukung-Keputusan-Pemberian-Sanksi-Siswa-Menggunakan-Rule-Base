@extends('backend.master')

@section('tittle-header')
<h1><i>Selamat Datang!</i> {{auth()->user()->name}}</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pengguna</h4>
          </div>
          <div class="card-body">
            {{ $user->count() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-user-edit"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Laporan Pelanggaran</h4>
          </div>
          <div class="card-body">
            {{ $laporan_pelanggaran->count() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-gavel"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Point Aturan Pelanggaran</h4>
          </div>
          <div class="card-body">
            {{ $rule->count() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info">
          <i class="fas fa-id-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Laporan Sanksi</h4>
          </div>
          <div class="card-body">
            {{ $laporan_sanksi->count() }}
          </div>
        </div>
      </div>
    </div>                  
</div> 

@if (Auth::user()->role == "siswa")
<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-body">
          <div class="section-title mt-0">Data Tata Tertib</div>
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Kode Tatib</th>
                      <th scope="col">Item Tatib</th>
                      <th scope="col">Kategori</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($tatib as $key => $item)
                  <tr>
                      <th scope="row">{{ $key+1 }}</th>
                      <td>{{ $item->kode_tatib }}</td>
                      <td>{{ $item->item_tatib }}</td>
                      <td>{{ $item->kategori }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="float-right">
            <a href="{{ route('tatib-siswa') }}" class="btn btn-info">...Selengkapnya</a>
          </div>
      </div>
  </div>
  </div>
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-body">
          <div class="section-title mt-0">Riwayat Pelanggaranku</i></div>
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
              <tbody>
                  @foreach ($riwayats as $key => $item)
                      <tr>
                      <td scope="row" >{{ $key+1 }}</td>
                      <td >{{ $item->kode_riwayat }}</td>
                      <td >{{ $item->siswa }}</td>
                      <td >{{ $item->kelas }}</td>
                      <td >{{ $item->kode_tatib }}</td>
                      <td >{{ $item->nama_tatib }}</td>
                      </tr>
                  </tbody>
                  @endforeach
              </tbody>
          </table>
          <div class="float-right">
            <a href="{{ route('riwayat-siswa') }}" class="btn btn-info">...Selengkapnya</a>
          </div>
      </div>
  </div>
  </div>
</div>
@endif
@endsection

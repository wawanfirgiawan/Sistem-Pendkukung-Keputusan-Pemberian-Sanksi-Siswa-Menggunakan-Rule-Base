@extends('backend.master')

    @section('tittle-header')
        <h1>Sanksi Pelanggaran</h1>
    @endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Data Sanksi Pelanggaran</div>
                <form action="{{ route('sanksi-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Kode Sanksi</label>
                        <input type="text" class="form-control" name="kode_sanksi">
                        @error('kode_sanksi')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label>Item Sanksi</label>
                        <input type="text" class="form-control" name="item_sanksi">
                        @error('item_sanksi')
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
    <div class="col-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Data Sanksi Pelanggaran</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Sanksi</th>
                            <th scope="col">Item Sanksi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sanksi as $key => $item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->kode_sanksi }}</td>
                            <td>{{ $item->item_sanksi }}</td>
                            <td>
                                {{-- <a href="#" class="btn btn-icon btn-info"><i class="fas fa-times"></i></a> --}}
                                <form action="{{ route('sanksi-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-icon btn-danger" type="submit"><i class="fa fa-lg fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                                            {{-- tag menambahkan pagination --}}
                                            <div class="mt-2 float-right">
                                                {{ $sanksi->links('vendor.pagination.bootstrap-4') }}
                                            </div>
            </div>
        </div>
    </div>
</div>



@endsection
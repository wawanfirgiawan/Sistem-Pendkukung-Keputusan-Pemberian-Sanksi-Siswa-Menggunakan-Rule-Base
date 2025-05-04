@extends('backend.master')

    @section('tittle-header')
        <h1>Tata Tertib</h1>
    @endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Data Tata Tertib</div>
                <form action="{{ route('tatib-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Kode Tata Tertib</label>
                        <input type="text" class="form-control" name="kode_tatib">
                        @error('kode_tatib')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label>Item Tata Terib</label>
                        <input type="text" class="form-control" name="item_tatib">
                        @error('item_tatib')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select class="form-control form-control-sm" name="kategori">
                                <option value="RINGAN">RINGAN</option>
                                <option value="SEDANG">SEDANG</option>
                                <option value="BERAT">BERAT</option>
                            </select>
                            @error('kategori_id')
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
                <div class="section-title mt-0">Data Tata Tertib</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Tatib</th>
                            <th scope="col">Item Tatib</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tatib as $key => $item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->kode_tatib }}</td>
                            <td>{{ $item->item_tatib }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                {{-- <a href="#" class="btn btn-icon btn-info"><i class="fas fa-times"></i></a> --}}
                                <form action="{{ route('tatib-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
                                                {{ $tatib->links('vendor.pagination.bootstrap-4') }}
                                            </div>
            </div>
        </div>
    </div>
</div>
@endsection
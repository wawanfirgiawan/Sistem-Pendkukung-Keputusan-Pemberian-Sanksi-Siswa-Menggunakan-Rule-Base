@extends('backend.master')

    @section('tittle-header')
        <h1>Tata Tertib</h1>
    @endsection
@section('content')
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
                                            {{-- tag menambahkan pagination --}}
                                            <div class="mt-2 float-right">
                                                {{ $tatib->links('vendor.pagination.bootstrap-4') }}
                                            </div>
            </div>
        </div>
@endsection
@extends('backend.master')

@section('tittle-header')
    <h1>Laporan Pelanggaran</h1>
@endsection

@section('content')
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
        <div class="section-title mt-0">Data Laporan Pelanggaran</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Pelanggaran</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal Laporan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Pelapor</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $key => $item)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->pelanggaran }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->created_at->format('j/n/Y') }}</td>
                    <td>
                        <button class="toggle-read btn {{ $item->is_read ? 'btn-success' : 'btn-danger' }}" 
                                data-id="{{ $item->id }}">
                            {{ $item->is_read ? 'Terbaca' : 'Tandai Terbaca' }}
                        </button>
                    </td>
                    <td>{{ $item->pelapor }}</td>
                    <td>
                        {{-- <a href="#" class="btn btn-icon btn-info"><i class="fas fa-times"></i></a> --}}
                        <form action="{{ route('lappel-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
                                        {{ $laporan->links('vendor.pagination.bootstrap-4') }}
                                    </div>
    </div>
</div>
@endsection
@section('addscript')
<script>
$(document).on('click', '.toggle-read', function() {
    var button = $(this);
    var id = button.data('id');
    var isRead = button.hasClass('btn-danger'); // Jika btn-secondary, berarti status sekarang belum terbaca

    $.ajax({
        url: '{{ route("laporan.toggleRead") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
            is_read: isRead
        },
        success: function(response) {
            if (isRead) {
                button.removeClass('btn-danger').addClass('btn-success');
                button.text('Terbaca');
            } else {
                button.removeClass('btn-success').addClass('btn-danger');
                button.text('Tandai Terbaca');
            }
        }
    });
});
</script>
@endsection
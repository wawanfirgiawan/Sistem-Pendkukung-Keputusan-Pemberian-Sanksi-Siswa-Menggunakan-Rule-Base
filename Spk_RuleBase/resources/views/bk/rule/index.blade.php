@extends('backend.master')

@section('tittle-header')
    <h1>Rule / Aturan Sanksi</h1>
@endsection
@section('addselect')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    {{-- <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Aturan Sanksi</div>
                <form action="{{ route('rule-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Pilih Pelanggaran</label>
                        <select name="rule[]"  class="form-control select2" multiple>
                            @foreach($tatibs as $tatib)
                                <option value="{{ $tatib->kode_tatib }}">{{ $tatib->kode_tatib }} - {{ $tatib->item_tatib }}</option>
                            @endforeach
                        </select>
                        @error('rule')
                            <span class="text-danger">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label>Pilih Sanksi</label>
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
    </div> --}}




    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="section-title mt-0">Tambah Aturan Sanksi</div>
                <form action="{{ route('rule-store') }}" method="POST">
                    @csrf
                    <div id="rule-container">
                        <div class="rule-group d-flex align-items-center mt-2">
                            <select name="rule[0][kode]" class="form-control select2 mr-1">
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
                    <div class="form-group mt-3 mr-2">
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
                <div class="section-title mt-0">Data Aturan Sanksi</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Item Pelanggaran</th>
                            <th scope="col">Sanksi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rule as $key => $item)
                        <tr>
                            <th scope="row">{{ $rule->firstItem() + $key }}</th>
                            <td>{{ $item->rule }}</td>
                            <td>{{ $item->sanksi }}</td>
                            <td>
                                <form action="{{ route('rule-delete', $item->id) }}" method="post" style="display: inline" class="form-check-inline">
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
                                                {{ $rule->links('vendor.pagination.bootstrap-4') }}
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
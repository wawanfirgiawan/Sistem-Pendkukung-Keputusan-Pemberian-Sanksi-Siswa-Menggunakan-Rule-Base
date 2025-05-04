<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\LaporanPelanggaran;
use Illuminate\Http\Request;

class LaporanPelanggaranController extends Controller
{
    public function index(){
        $laporan = LaporanPelanggaran::orderBy('created_at', 'desc')->paginate(10);
        $kelas = Kelas::all();
        
        // return view('admin.kelas.index', compact('kelas'));
        return view('user.laporan_pelanggaran.index', compact('laporan','kelas'));
    }

    public function create(){
        $kelas_siswa = Kelas::all();

        return view('user.laporan_pelanggaran.create', compact('kelas_siswa'));
    }

    public function hasil($id){
        // $laporan = LaporanPelanggaran::where("id", $id)->first();
        $laporan = LaporanPelanggaran::findOrFail($id);
        $kelas = Kelas::all();

        return view('user.laporan_pelanggaran.hasil', compact('laporan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'pelanggaran' => 'required',
            'keterangan' => 'required',
        ],[
            'nama_siswa.required' => 'nama siswa belum di masukkan',
            'kelas_id.required' => 'kelas belum di masukkan',
            'pelanggaran.required' => 'pelanggaran belum di masukkan',
            'keterangan.required' => 'keterangan belum di masukkan'
        ]);

        $laporan = new LaporanPelanggaran();
        $laporan->nama_siswa = $request->nama_siswa;
        $laporan->pelanggaran = $request->pelanggaran;
        $laporan->keterangan = $request->keterangan;
        $laporan->pelapor = auth()->user()->name;
        $laporan->kelas_id = $request->kelas_id;
        $laporan->save();

        // $laporan = LaporanPelanggaran::create($request->all());
        // return redirect()->route('kelas-index')->with('success', 'Data berhasil ditambahkan!');
        return redirect()->route('lappel-hasil', $laporan->id)->with('success', 'Data berhasil ditambahkan!');
    }

    public function toggleRead(Request $request)
{
    $laporan = LaporanPelanggaran::find($request->id);
    $laporan->is_read = $request->is_read == "true" ? true : false;
    $laporan->save();

    return response()->json(['success' => 'Status berhasil diubah']);
}

    //     public function edit($id){
    //     $kelas = ClasStudent::where("id", $id)->first();

    //     return view('Admin.Kelas.edit', compact('kelas'));
    // }

    // public function update(Request $request, $id){
    //     $kelas = ClasStudent::where("id", $id)->first();
    //     $kelas->update($request->all());

    //     return redirect()->route('kelas-index')->with('success', 'Data berhasil diupdate!');
    // }

    public function destroy($id){
        $laporan = LaporanPelanggaran::where("id", $id)->first();
        $laporan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

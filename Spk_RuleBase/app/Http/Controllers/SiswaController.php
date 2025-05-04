<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request){
        $kelas = Kelas::all();
        $siswa = Siswa::paginate(10);
        $filterKeyword = $request->get('nama');
        if($filterKeyword){
            $siswa = Siswa::where("nama", "LIKE",
        "%$filterKeyword%")->paginate(5);
        }
        
        return view('admin.siswa.index', compact('kelas','siswa'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
        ],[
            'nis.required' => 'nis belum di masukkan',
            'nis.unique' => 'nis sudah digunakan',
            'nama.required' => 'nama siswa belum di masukkan',
            'jenis_kelamin.required' => 'jenis kelamin belum di masukkan',
            'alamat.required' => 'alamat belum di masukkan',
            'kelas_id.required' => 'kelas belum di masukkan'
        ]);

        Siswa::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
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
        $siswa = Siswa::where("id", $id)->first();
        $siswa->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

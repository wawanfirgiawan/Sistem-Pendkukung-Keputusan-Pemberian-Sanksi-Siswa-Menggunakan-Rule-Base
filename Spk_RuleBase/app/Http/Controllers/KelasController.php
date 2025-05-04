<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request){
        $kelas = Kelas::paginate(10);

        $filterKeyword = $request->get('nama_kelas');
        if($filterKeyword){
            $kelas = Kelas::where("nama_kelas", "LIKE",
        "%$filterKeyword%")->paginate(5);
        }

        return view('admin.kelas.index', compact('kelas'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'kode_kelas' => 'required|unique:kelas,kode_kelas',
            'nama_kelas' => 'required',
        ],[
            'kode_kelas.required' => 'kode kelas belum di masukkan',
            'kode_kelas.unique' => 'Kode kelas sudah digunakan',
            'nama_kelas.required' => 'nama kelas belum di masukkan'
        ]);

        Kelas::create($request->all());
        // return redirect()->route('kelas-index')->with('success', 'Data berhasil ditambahkan!');
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
        $kelas = Kelas::where("id", $id)->first();
        $kelas->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

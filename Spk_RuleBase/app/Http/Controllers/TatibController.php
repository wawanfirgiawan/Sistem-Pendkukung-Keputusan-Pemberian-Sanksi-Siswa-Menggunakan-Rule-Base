<?php

namespace App\Http\Controllers;

use App\Models\Tatib;
use Illuminate\Http\Request;

class TatibController extends Controller
{
    public function index(){
        $tatib = Tatib::paginate(10);
        
        return view('admin.tatib.index', compact('tatib'));
    }

    public function indexsiswa(){
        $tatib = Tatib::paginate(10);
        
        return view('admin.tatib.tatibindexsiswa', compact('tatib'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_tatib' => 'required|unique:tatibs,kode_tatib',
            'item_tatib' => 'required',
        ],[
            'kode_tatib.required' => 'kode tatib belum di masukkan',
            'kode_tatib.unique' => 'Kode tatib sudah digunakan',
            'item_tatib.required' => 'item tatib belum di masukkan'
        ]);

        Tatib::create($request->all());
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
        $tatib = Tatib::where("id", $id)->first();
        $tatib->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

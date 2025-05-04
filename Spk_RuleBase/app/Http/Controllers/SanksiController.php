<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    public function index(){
        $sanksi = Sanksi::paginate(10);
        
        return view('admin.sanksi.index', compact('sanksi'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'kode_sanksi' => 'required|unique:sanksis,kode_sanksi',
            'item_sanksi' => 'required',
        ],[
            'kode_sanksi.required' => 'kode sanksi belum di masukkan',
            'kode_sanksi.unique' => 'Kode sanksi sudah digunakan',
            'item_sanksi.required' => 'item sanksi belum di masukkan',
        ]);

        Sanksi::create($request->all());
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
        $sanksi = Sanksi::where("id", $id)->first();
        $sanksi->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

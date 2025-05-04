<?php

namespace App\Http\Controllers;

use App\Models\Rule_tatib;
use App\Models\Sanksi;
use App\Models\Tatib;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RuleTatibController extends Controller
{
    public function index(){
        $tatibs = Tatib::all();
        $sanksis = Sanksi::all();
        // $rule = Rule_tatib::paginate(10);
        

        $rule = DB::table('rule_tatibs')
                    ->join('sanksis', 'rule_tatibs.id_sanksi', '=', 'sanksis.id')
                    ->select('rule_tatibs.*' , 'sanksis.item_sanksi as sanksi')
                    ->paginate(10);


        return view('bk.rule.index', compact('tatibs', 'sanksis','rule'));
        
    }

    // public function store(Request $request){
    //     $this->validate($request, [
    //         'rule' => 'required', 
    //         'id_sanksi' => 'required',
    //     ],[
    //         'rule.required' => 'item pelanggaran belum di masukkan',
    //         'id_sanksi.required' => 'sanksi belum dimasukkan',
    //     ]);

    //     Rule_tatib::create([
    //         'rule' => json_encode($request->rule),
    //         'id_sanksi' => $request->id_sanksi,
    //     ]);


    //     // dd($request->rule);

    //     return redirect()->back()->with('success', 'Data Aturan Sanksi berhasil ditambahkan!');

    //     // dd($request->all());
    // }

    public function store(Request $request)
{
    $request->validate([
        'rule' => 'required|array',
        'rule.*.kode' => 'required|string',
        'rule.*.operator' => 'required|string',
        'rule.*.batas' => 'required|integer',
        'id_sanksi' => 'required|exists:sanksis,id',
    ]);

    Rule_tatib::create([
        'rule' => json_encode(array_values($request->rule)), // Simpan dalam format JSON
        'id_sanksi' => $request->id_sanksi,
    ]);

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
        $rule = Rule_tatib::where("id", $id)->first();
        $rule->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

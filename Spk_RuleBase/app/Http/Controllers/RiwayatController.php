<?php

namespace App\Http\Controllers;

use App\Models\LaporanSanksi;
use App\Models\Riwayat;
use App\Models\Rule_tatib;
use App\Models\Sanksi;
use App\Models\Siswa;
use App\Models\Tatib;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RiwayatController extends Controller
{

    public function selectcounthistory(Request $request){
        $riwayat = DB::table('riwayats')
                    ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('siswas.id as siswa_id','siswas.nama as siswa', 'kelas.kode_kelas as kelas', DB::raw('COUNT(riwayats.id) as jumlah_pelanggaran'))
                    ->groupBy('siswas.id','siswas.nama', 'kelas.kode_kelas')
                    ->paginate(10);

                    $filterKeyword = $request->get('siswa_id');
                    if ($filterKeyword) {
                        $riwayat = DB::table('riwayats')
                            ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
                            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                            ->select(
                                'siswas.id as siswa_id',
                                'siswas.nama as siswa',
                                'kelas.kode_kelas as kelas',
                                DB::raw('COUNT(riwayats.id) as jumlah_pelanggaran')
                            )
                            ->where('siswas.nama', 'LIKE', "%$filterKeyword%")
                            ->groupBy('siswas.id', 'siswas.nama', 'kelas.kode_kelas')
                            ->paginate(5);
                    }
                    
        return view('bk.riwayat.index', compact('riwayat'));
    }


    public function detailhistory($siswa_id, $id){
        $riwayats = DB::table('riwayats')
                    ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
                    ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('riwayats.*' , 'siswas.nama as siswa', 'kelas.kode_kelas as kelas', 'tatibs.kode_tatib as kode_tatib', 'tatibs.item_tatib as nama_tatib', 'riwayats.kode_riwayat')
                    ->where('riwayats.siswa_id',$siswa_id)
                    ->get();
        
        $laporan = DB::table('laporan_sanksis')
                    ->join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('laporan_sanksis.*' , 'siswas.nama as siswa', 'kelas.kode_kelas as kelas')
                    ->orderBy('laporan_sanksis.created_at', 'desc') // pastikan ada kolom `created_at`
                    ->first();

                    

        $siswa = Siswa::findOrFail($id);
        $siswa->get();
        $tatibs = Tatib::all();
        $sanksis = Sanksi::all();
        // $laporan = LaporanSanksi::all();
        // dd($siswa_id);
        return view('bk.riwayat.detail_riwayat', compact('riwayats','siswa','tatibs','sanksis','laporan'));
    }
    

    public function riwayatSiswa(){
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $siswa_id = $user->siswa_id;


        $riwayats = DB::table('riwayats')
                    ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
                    ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('riwayats.*' , 'siswas.nama as siswa', 'kelas.kode_kelas as kelas', 'tatibs.kode_tatib as kode_tatib', 'tatibs.item_tatib as nama_tatib', 'riwayats.kode_riwayat')
                    ->where('riwayats.siswa_id',$siswa_id)
                    ->get();

        $nama_siswa = DB::table('users')
                    ->join('siswas', 'users.siswa_id', '=', 'siswas.id')
                    ->select('users.*' , 'siswas.nama as siswa')
                    ->where('users.siswa_id',$siswa_id)
                    ->first();

        return view('bk.riwayat.siswariwayat', compact('riwayats','nama_siswa'));
    }

    public function riwayatsiswaall(){
        $riwayats = DB::table('riwayats')
                    ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
                    ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('riwayats.*' , 'siswas.nama as siswa', 'kelas.kode_kelas as kelas', 'tatibs.kode_tatib as kode_tatib', 'tatibs.item_tatib as nama_tatib', 'riwayats.kode_riwayat')
                    ->paginate(10);

        return view('bk.riwayat.allriwayatsiswa', compact('riwayats'));
    }



    // public function postSanksi($siswa_id){
    //     $riwayatPelanggaran = DB::table('riwayats')
    //     ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
    //     ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
    //     ->select('siswas.id as siswa_id', 'siswas.nama', 'tatibs.kode_tatib', 'tatibs.item_tatib')
    //     ->where('siswas.id', $siswa_id)
    //     ->get()
    //     ->groupBy('siswa_id');

    //     foreach ($riwayatPelanggaran as $riwayat) {

    //         $kode_tatib = $riwayat->pluck('kode_tatib')->toArray();
    //         $kode_string = json_encode($kode_tatib);


    //         $item_tatib = $riwayat->pluck('item_tatib');
    //         $nama_siswa = $riwayat->pluck('nama')->first();


    //         $rule = Rule_tatib::where(function($query) use ($kode_tatib) {
    //             $query->whereRaw('JSON_CONTAINS(rule, ?)', [json_encode($kode_tatib)]);
    //         })->first();

    //         $sanksi = '';

    //         if ($rule) {
    //             $sanksiModel = Sanksi::find($rule->id_sanksi);
    //             if ($sanksiModel) {
    //                 // $sanksi = $sanksiModel->item_sanksi;
    //                 $laporan = new LaporanSanksi();
    //                 $laporan->siswa_id = $siswa_id;
    //                 $laporan->daftar_pelanggaran = $item_tatib;
    //                 $laporan->kode_tatib = $kode_string;
    //                 $laporan->sanksi = $sanksiModel->item_sanksi;
    //                 $laporan->save();

    //                 return redirect()->back()->with('newLaporan','Data Laporan Sanksi Behasil di Tambahkan.');
    //             }
    //         }else{
    //             return redirect()->back()->with('newRule','Data Aturan Pemberian Sanksi Tidak Tersedia! Silahkan Tambahkan Aturan Baru Sesuai Riwayat Pelanggaran Siswa Terkait, dan Lakukan Proses Sanksi Kembali.');
    //         }

    //     }
    // }

    

    public function akumulasiTatib($siswa_id) {
        $riwayat = DB::table('riwayats')
            ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
            ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
            ->select(
                'siswas.id as siswa_id', 
                'siswas.nama', 
                'tatibs.kode_tatib', 
                'tatibs.item_tatib',
                DB::raw('COUNT(riwayats.tatib_id) as jumlah_pelanggaran')
            )
            ->where('siswas.id', $siswa_id)
            ->groupBy('siswas.id', 'siswas.nama', 'tatibs.kode_tatib', 'tatibs.item_tatib')
            ->get();
    
        // Simpan data ke session agar bisa digunakan di view
        return redirect()->back()->with([
            'akumulasi' => 'Hasil Akumulasi.',
            'riwayat' => $riwayat // Kirim data ke session
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'tanggal_laporan' => 'required',
            'siswa_id' => 'required',
            'tatib_id' => 'required',
        ],[
            'tanggal_laporan' => 'Tanggal Laporan belum di masukkan',
            'siswa_id' => 'siswa belum di masukkan',
            'tatib_id' => 'Pelanggaran belum di masukkan',
        ]);

        // Riwayat::create($request->all());


        // Mengambil jumlah data riwayat untuk membuat kode baru
        $count = Riwayat::count();
        $nextNumber = $count + 1; // Nomor berikutnya

        // Membuat format kode
        $kodeRiwayat = 'R' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT); // Menghasilkan format seperti R001, R002, dll.

        // Membuat data riwayat baru
        $riwayat = new Riwayat;
        $riwayat->kode_riwayat = $kodeRiwayat;
        $riwayat->siswa_id = $request->siswa_id;
        $riwayat->tatib_id = $request->tatib_id;
        $riwayat->tanggal_laporan = $request->tanggal_laporan;

        $riwayat->save();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

//     public function postSanksi1($siswa_id)
// {
//     // Ambil riwayat pelanggaran siswa
//     $riwayat = DB::table('riwayats')
//         ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
//         ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
//         ->select(
//             'siswas.id as siswa_id',
//             'siswas.nama',
//             'tatibs.kode_tatib',
//             DB::raw('COUNT(riwayats.tatib_id) as jumlah_pelanggaran')
//         )
//         ->where('siswas.id', $siswa_id)
//         ->groupBy('siswas.id', 'siswas.nama', 'tatibs.kode_tatib')
//         ->get();

//     // Konversi riwayat ke dalam array asosiatif untuk akses cepat
//     $pelanggaranMap = [];
//     foreach ($riwayat as $pelanggaran) {
//         $pelanggaranMap[$pelanggaran->kode_tatib] = $pelanggaran->jumlah_pelanggaran;
//     }

//     // Ambil aturan rule dari database
//     $rules = DB::table('rule_tatibs')->get();

//     $sanksiTerpilih = null;

//     foreach ($rules as $rule) {
//         $ruleArray = json_decode($rule->rule, true);
//         $cocokSemuaSyarat = true;
    
//         foreach ($ruleArray as $r) {
//             if (preg_match('/([<>]?=?|\d+-\d+)?\s*(\d+)\s*X\s*(\w+)/', $r, $matches)) {
//                 $operator = $matches[1] ?: "=";
//                 $batas = (int) $matches[2];
//                 $kodeTatibSyarat = $matches[3];
    
//                 $jumlahPelanggaran = $pelanggaranMap[$kodeTatibSyarat] ?? 0;
    
//                 // Debugging aturan yang sedang diproses
//                 // dd("Cek aturan", $rule->id_sanksi, $operator, $batas, $kodeTatibSyarat, $jumlahPelanggaran);
    
//                 // Validasi aturan
//                 if (($operator === "<" && $jumlahPelanggaran >= $batas) ||
//                     ($operator === ">" && $jumlahPelanggaran <= $batas) ||
//                     ($operator === "=" && $jumlahPelanggaran !== $batas)) {
                    
//                     $cocokSemuaSyarat = false;
//                     break; // STOP jika aturan tidak cocok
//                 } elseif (preg_match('/(\d+)-(\d+)/', $operator, $rangeMatch)) {
//                     $minBatas = (int) $rangeMatch[1];
//                     $maxBatas = (int) $rangeMatch[2];
    
//                     if ($jumlahPelanggaran < $minBatas || $jumlahPelanggaran > $maxBatas) {
//                         $cocokSemuaSyarat = false;
//                         break;
//                     }
//                 }
//             }
//         }
    
//         // Jika aturan valid, pilih sanksi
//         if ($cocokSemuaSyarat) {
//             dd("Sanksi cocok", $rule->id_sanksi); // Debugging jika aturan cocok
//             $sanksiTerpilih = $rule->id_sanksi;
//             break; // STOP pencarian jika sanksi ditemukan
//         }
//     }
    

//     // if ($sanksiTerpilih) {
//     //     // Simpan sanksi ke database menggunakan model
//     //     DB::table('sanksis')->insert([
//     //         'siswa_id' => $siswa_id,
//     //         'id_sanksi' => $sanksiTerpilih,
//     //         'created_at' => now(),
//     //         'updated_at' => now(),
//     //     ]);

//     //     return redirect()->back()->with('success', 'Sanksi berhasil diproses.');
//     // } else {
//     //     return redirect()->back()->with('error', 'Tidak ada sanksi yang sesuai dengan aturan.');
//     // } 

//     // dd($sanksiTerpilih);
// }

// public function postSanksi1($siswa_id)
// {
//     // Ambil riwayat pelanggaran siswa
//     $riwayat = DB::table('riwayats')
//         ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
//         ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
//         ->select(
//             'siswas.id as siswa_id',
//             'siswas.nama',
//             'tatibs.kode_tatib',
//             DB::raw('COUNT(riwayats.tatib_id) as jumlah_pelanggaran')
//         )
//         ->where('siswas.id', $siswa_id)
//         ->groupBy('siswas.id', 'siswas.nama', 'tatibs.kode_tatib')
//         ->get();

//     // Konversi riwayat ke dalam array asosiatif
//     $pelanggaranMap = [];
//     foreach ($riwayat as $pelanggaran) {
//         $pelanggaranMap[$pelanggaran->kode_tatib] = $pelanggaran->jumlah_pelanggaran;
//     }

//     // Ambil semua aturan rule dari database
//     $rules = DB::table('rule_tatibs')->get();
//     $sanksiYangCocok = [];

//     foreach ($rules as $rule) {
//         $ruleArray = json_decode($rule->rule, true);
//         $cocokSemuaSyarat = true;
    
//         // Kumpulkan kode tatib dari rule
//         $kodeTatibDalamRule = array_column($ruleArray, 'kode');
    
//         // Ambil hanya kode tatib dari riwayat yang ada dalam rule
//         $pelanggaranTerpakai = array_intersect_key($pelanggaranMap, array_flip($kodeTatibDalamRule));
    
//         // Jika jumlah tatib dalam riwayat tidak sama dengan rule, maka tidak cocok
//         if (count($pelanggaranTerpakai) !== count($kodeTatibDalamRule)) {
//             continue; // Langsung skip rule ini
//         }
    
//         foreach ($ruleArray as $r) {
//             $kodeTatibSyarat = $r['kode'];
    
//             // Jika kode tatib dalam rule tidak ada di pelanggaran siswa, rule gagal
//             if (!isset($pelanggaranMap[$kodeTatibSyarat])) {
//                 $cocokSemuaSyarat = false;
//                 break;
//             }
    
//             $operator = $r['operator'] ?? '=';
//             $batas = (int) ($r['batas'] ?? 0);
//             $jumlahPelanggaran = $pelanggaranMap[$kodeTatibSyarat];
    
//             // Validasi berdasarkan range (jika ada)
//             if (isset($r['max_batas'])) {
//                 $maxBatas = (int) $r['max_batas'];
//                 if ($jumlahPelanggaran < $batas || $jumlahPelanggaran > $maxBatas) {
//                     $cocokSemuaSyarat = false;
//                     break;
//                 }
//             } 
//             // Validasi berdasarkan operator
//             elseif (($operator === "<" && $jumlahPelanggaran >= $batas) ||
//                     ($operator === ">" && $jumlahPelanggaran <= $batas) ||
//                     ($operator === "<=" && $jumlahPelanggaran > $batas) ||
//                     ($operator === ">=" && $jumlahPelanggaran < $batas) ||
//                     ($operator === "=" && $jumlahPelanggaran !== $batas)) {
//                 $cocokSemuaSyarat = false;
//                 break;
//             }
//         }
    
//         // Jika semua syarat dalam satu rule cocok, simpan sanksi yang cocok
//         if ($cocokSemuaSyarat) {
//             $sanksiYangCocok[] = $rule->id_sanksi;
//         }
//     }
    
//     // Jika tidak ada rule yang cocok, berikan string "tidak ada rule yang cocok"
//     $sanksiTerpilih = !empty($sanksiYangCocok) ? max($sanksiYangCocok) : "tidak ada rule yang cocok";
    
//     // Debugging hasil akhir
//     dd("Sanksi Yang Cocok", $sanksiYangCocok, "Sanksi Terpilih", $sanksiTerpilih);
// }

public function postSanksi1($siswa_id)
{
    // Ambil riwayat pelanggaran siswa
    $riwayat = DB::table('riwayats')
        ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
        ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
        ->select(
            'siswas.id as siswa_id',
            'siswas.nama',
            'tatibs.kode_tatib',
            DB::raw('COUNT(riwayats.tatib_id) as jumlah_pelanggaran')
        )
        ->where('siswas.id', $siswa_id)
        ->groupBy('siswas.id', 'siswas.nama', 'tatibs.kode_tatib')
        ->get();

    // Konversi riwayat ke dalam array asosiatif
    $pelanggaranMap = [];
    foreach ($riwayat as $pelanggaran) {
        $pelanggaranMap[$pelanggaran->kode_tatib] = (int) $pelanggaran->jumlah_pelanggaran;
    }

    Log::info("Pelanggaran Map", $pelanggaranMap);

    // Ambil semua aturan rule dari database
    $rules = DB::table('rule_tatibs')->get();
    $sanksiYangCocok = [];

    foreach ($rules as $rule) {
        $ruleArray = json_decode($rule->rule, true);
        if (!$ruleArray) {
            Log::error("Rule JSON tidak valid", ['rule' => $rule->rule]);
            continue;
        }

        Log::info("Mengecek Rule", ['rule' => $ruleArray]);

        // Ambil kode tatib dari rule
        $kodeTatibDalamRule = array_column($ruleArray, 'kode');
        $pelanggaranTerpakai = array_intersect_key($pelanggaranMap, array_flip($kodeTatibDalamRule));

        // **PERBAIKAN PENTING:** Pastikan rule dan pelanggaran memiliki jumlah kode tatib yang sama
        if (count($pelanggaranTerpakai) !== count($kodeTatibDalamRule)) {
            Log::info("Rule dilewati karena jumlah tatib dalam rule tidak cocok dengan riwayat siswa.", ['rule' => $ruleArray]);
            continue;
        }

        // **PERBAIKAN PENTING:** Pastikan tidak ada pelanggaran di luar rule
        if (count($pelanggaranMap) !== count($kodeTatibDalamRule)) {
            Log::info("Rule dilewati karena ada pelanggaran yang tidak termasuk dalam rule.", ['rule' => $ruleArray]);
            continue;
        }

        $cocokSemuaSyarat = true;

        foreach ($ruleArray as $r) {
            $kodeTatibSyarat = $r['kode'];
            $operator = $r['operator'] ?? '=';
            $batas = (int) ($r['batas'] ?? 0);
            $jumlahPelanggaran = $pelanggaranMap[$kodeTatibSyarat] ?? 0;

            // Validasi berdasarkan range (jika ada max_batas)
            if (isset($r['max_batas'])) {
                $maxBatas = (int) $r['max_batas'];
                if ($jumlahPelanggaran < $batas || $jumlahPelanggaran > $maxBatas) {
                    $cocokSemuaSyarat = false;
                    break;
                }
            }
            // Validasi berdasarkan operator
            elseif (($operator === "<" && $jumlahPelanggaran >= $batas) ||
                    ($operator === ">" && $jumlahPelanggaran <= $batas) ||
                    ($operator === "<=" && $jumlahPelanggaran > $batas) ||
                    ($operator === ">=" && $jumlahPelanggaran < $batas) ||
                    ($operator === "=" && $jumlahPelanggaran !== $batas)) {
                $cocokSemuaSyarat = false;
                break;
            }
        }

        // Jika rule cocok dengan seluruh pelanggaran siswa
        if ($cocokSemuaSyarat) {
            Log::info("Rule Cocok", ['rule_id' => $rule->id_sanksi]);
            $sanksiYangCocok[] = $rule->id_sanksi;
        }
    }

    // Jika tidak ada rule yang cocok, berikan pesan "tidak ada rule yang cocok"
    // $sanksiTerpilih = !empty($sanksiYangCocok) ? max($sanksiYangCocok) : "tidak ada rule yang cocok";
    if (!empty($sanksiYangCocok)) {
        $sanksiTerpilih = max($sanksiYangCocok);
        $sanksiModel = Sanksi::find($sanksiTerpilih);
        $laporan = new LaporanSanksi();
                $laporan->siswa_id = $siswa_id;
                $laporan->daftar_pelanggaran = "tes";
                $laporan->kode_tatib = $pelanggaranMap[$pelanggaran->kode_tatib];
                $laporan->sanksi = $sanksiModel->item_sanksi;
                $laporan->save();

                return redirect()->back()->with('newLaporan','Data Laporan Sanksi Behasil di Tambahkan.');
    } else {
        // $sanksiTerpilih = "tidak ada rule yang cocok";
        return redirect()->back()->with('newRule','Data Aturan Pemberian Sanksi Tidak Tersedia! Silahkan Tambahkan Aturan Baru Sesuai Riwayat Pelanggaran Siswa Terkait, dan Lakukan Proses Sanksi Kembali.');
    }
    

    

}









    public function selectsiswa(){
        $data = Siswa::where('nama','LIKE','%'.request('q').'%')->paginate(10);
        return response()->json($data);
    }

    public function selecttatib(){
        $data = Tatib::where('item_tatib','LIKE','%'.request('q').'%')->paginate(10);
        return response()->json($data);
    }



    public function destroy($id){
        $riwayat = Riwayat::where("id", $id)->first();
        $riwayat->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\LaporanSanksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class LaporanSanksiController extends Controller
{
    public function index(Request $request){
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $siswa_id = $user->siswa_id;

        $laporan = DB::table('laporan_sanksis')
                    ->join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('laporan_sanksis.id as id','siswas.nama as nama', 'kelas.kode_kelas as kelas', 'siswas.alamat as alamat','laporan_sanksis.daftar_pelanggaran as pelanggaran', 'laporan_sanksis.sanksi as sanksi')
                    // ->groupBy('siswas.id','siswas.nama', 'kelas.kode_kelas')
                    ->paginate(10);
    
        $laporan_anak = DB::table('laporan_sanksis')
                    ->join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('laporan_sanksis.id as id','siswas.nama as nama', 'kelas.kode_kelas as kelas', 'siswas.alamat as alamat','laporan_sanksis.daftar_pelanggaran as pelanggaran', 'laporan_sanksis.sanksi as sanksi')
                    ->where('laporan_sanksis.siswa_id', $siswa_id)
                    ->get();
        

                    $filterKeyword = $request->get('siswa_id');
                    if($filterKeyword){
                        $laporan = LaporanSanksi::join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
                                ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                                ->select('laporan_sanksis.id as id','siswas.nama as nama', 'kelas.kode_kelas as kelas', 'siswas.alamat as alamat','laporan_sanksis.daftar_pelanggaran as pelanggaran', 'laporan_sanksis.sanksi as sanksi') // Pilih semua kolom dari tabel LaporanSanksi
                                ->where('siswas.nama', 'LIKE', "%$filterKeyword%")
                                ->paginate(5);
                    }

        return view('bk.laporan_sanksi.index', compact('laporan','laporan_anak'));
    }

    public function export($id){

        $data = DB::table('laporan_sanksis')
        ->join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
        ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
        ->join('riwayats', 'siswas.id', '=', 'riwayats.siswa_id')
        ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id') // Join dengan tabel tatib
        ->select(
            'laporan_sanksis.id as id', 
            'siswas.nama as nama',
            'siswas.nis as nis', 
            'kelas.nama_kelas as kelas',
            'siswas.alamat as alamat', 
            'laporan_sanksis.sanksi as sanksi',
            'riwayats.tanggal_laporan as tanggal', 
            'tatibs.kode_tatib as pelanggaran', // Menambahkan kode_tatib dari tabel tatib
            'tatibs.item_tatib as kode'  // Menambahkan item_tatib dari tabel tatib
        )
        ->where('laporan_sanksis.id', $id)
        ->get();
        
            $laporan = DB::table('laporan_sanksis')
            ->join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('laporan_sanksis.id as id', 'siswas.nama as nama','siswas.nis as nis', 'kelas.nama_kelas as kelas', 'siswas.alamat as alamat', 'laporan_sanksis.daftar_pelanggaran as pelanggaran','laporan_sanksis.kode_tatib as kode', 'laporan_sanksis.sanksi as sanksi')
            ->where('laporan_sanksis.id', $id)
            ->first();

        // Path ke gambar di folder public
        $path = public_path('backend/img/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataImage = file_get_contents($path);
        $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($dataImage);

        $pdf = Pdf::loadView('bk.pdf.laporanSanksi', [
            'laporan' => $laporan,
            'data' => $data,
            'base64Image' => $base64Image
        ]);
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function PdfDataSanksi(){
        $data = DB::table('laporan_sanksis')
        ->join('siswas', 'laporan_sanksis.siswa_id', '=', 'siswas.id')
        ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
        ->select('laporan_sanksis.id as id', 'siswas.nama as nama','siswas.nis as nis', 'kelas.nama_kelas as kelas', 'siswas.alamat as alamat', 'laporan_sanksis.daftar_pelanggaran as pelanggaran','laporan_sanksis.kode_tatib as kode', 'laporan_sanksis.sanksi as sanksi')
        // ->where('laporan_sanksis.id', $id)
        ->get();

        // Path ke gambar di folder public
        $path = public_path('backend/img/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataImage = file_get_contents($path);
        $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($dataImage);

        $pdf = Pdf::loadView('bk.pdf.dataLaporanSanksi', ['data' => $data, 'base64Image' => $base64Image]);
        $pdf->setPaper('a4', 'landscape'); // Mengatur kertas menjadi A4 landscape
        $pdf->setOption('margin-left', '1cm'); // Mengatur margin kiri
        $pdf->setOption('margin-right', '1cm'); // Mengatur margin kanan
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);
        return $pdf->stream('DataLaporan.pdf');
    }

    // public function store(Request $request){
    //     $this->validate($request, [
    //         'kode_sanksi' => 'required',
    //         'item_sanksi' => 'required',
    //     ],[
    //         'kode_sanksi' => 'kode sanksi belum di masukkan',
    //         'item_sanksi' => 'item sanksi belum di masukkan',
    //     ]);

    //     Sanksi::create($request->all());
    //     return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    // }

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
        $laporan = LaporanSanksi::where("id", $id)->first();
        $laporan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

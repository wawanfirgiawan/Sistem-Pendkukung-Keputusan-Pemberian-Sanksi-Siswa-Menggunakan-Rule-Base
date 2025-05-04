<?php

namespace App\Http\Controllers;

use App\Models\LaporanPelanggaran;
use App\Models\LaporanSanksi;
use App\Models\Rule_tatib;
use App\Models\Tatib;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $laporan_pelanggaran = LaporanPelanggaran::all();
        $rule = Rule_tatib::all();
        $laporan_sanksi = LaporanSanksi::all();

        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $siswa_id = $user->siswa_id;

        $riwayats = DB::table('riwayats')
                    ->join('siswas', 'riwayats.siswa_id', '=', 'siswas.id')
                    ->join('tatibs', 'riwayats.tatib_id', '=', 'tatibs.id')
                    ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->select('riwayats.*' , 'siswas.nama as siswa', 'kelas.kode_kelas as kelas', 'tatibs.kode_tatib as kode_tatib', 'tatibs.item_tatib as nama_tatib', 'riwayats.kode_riwayat')
                    ->where('riwayats.siswa_id',$siswa_id)
                    ->paginate(5);

        $tatib = Tatib::paginate(5);

        return view('dashboard', compact('user','laporan_pelanggaran','rule','laporan_sanksi','riwayats','tatib'));
    }
}

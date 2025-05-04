<?php

namespace App\Http\Controllers;

use App\Models\PendingRegistration;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request){
        $siswas = Siswa::all();
        $user = User::paginate(10);
        $pendingUsers = PendingRegistration::all();
        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $user = User::where("name", "LIKE",
        "%$filterKeyword%")->paginate(10);
        }

        return view('admin.userm.create', compact('siswas','user','pendingUsers'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'siswa_id' => 'required',
        ],[
            'name.required' => 'nama belum di masukkan',
            'email.required' => 'email belum di masukkan',
            'role.required' => 'role belum di pilih',
            'siswa_id.required' => 'Siswa belum di Pilih'
        ]);

        $post = $request->all();
        $post['password'] = Hash::make('12345678');
        // $post['photo'] = 'profile.svg';
        // dd($post);
        User::create($post);

        return redirect()->back()->with('success', 'Sukses Tambah Data User');
    }

    public function ubahPassword(){

        return view('user.akun.ubahPassword');
    }

    public function updatePassword(Request $request){

         // Validasi input
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Password baru dan konfirmasi password tidak cocok.',
            'password.min' => 'Password Harus terdiri 8 karakter atau lebih.',
        ]);
        
        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        $user->password = Hash::make($request->password);
        // dd($user);
        $user->save();
        return redirect()->back()->with('success', 'Password Berhasil Di Ubah!');
    }

    public function destroy($id){
        $user = User::where("id", $id)->first();
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}

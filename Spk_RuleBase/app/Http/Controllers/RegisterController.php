<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendingRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function index(){

        return view('user.register');
    }

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:pending_registrations,email',
        'role' => 'required|in:siswa,guru,ortu',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    PendingRegistration::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'siswa_id' => $request->siswa_id,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil, menunggu persetujuan admin.');
}


// public function index1()
// {
//     $pendingUsers = PendingRegistration::all();
//     return view('admin.approvals', compact('pendingUsers'));
// }

public function approve($id)
{
    $pending = PendingRegistration::findOrFail($id);

    User::create([
        'name' => $pending->name,
        'email' => $pending->email,
        'role' => $pending->role,
        'siswa_id' => $pending->siswa_id,
        'password' => $pending->password, // Sudah di-hash sebelumnya
    ]);

    $pending->delete(); // Hapus data dari pending registrations setelah disetujui

    return redirect()->route('user-create')->with('success', 'Registrasi disetujui.');
}

}

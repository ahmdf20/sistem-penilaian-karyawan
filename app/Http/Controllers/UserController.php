<?php

namespace App\Http\Controllers;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;
use SebastianBergmann\Type\VoidType;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pegawai.index', [
            'title' => 'SPK | Pegawai',
            'pegawai' => User::where([
                ['peran', '!=', 'project-manager'],
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function tambah(): View
    {
        return view('pegawai.tambah', [
            'title' => 'SPK | Tambah Pegawai',
        ]);
    }

    public function detail($uuid): View
    {
        return view('pegawai.detail', [
            'title' => 'SPK | Detail Pegawai',
            'pegawai' => User::where('uuid', $uuid)->first()
        ]);
    }

    public function edit($uuid): View
    {
        return view('pegawai.edit', [
            'title' => 'SPK | Edit Pegawai',
            'pegawai' => User::where('uuid', $uuid)->first()
        ]);
    }

    public function edit_password($uuid): View
    {
        return view('pegawai.edit-password', [
            'title' => 'SPK | Edit Password Pegawai',
            'pegawai' => User::where('uuid', $uuid)->first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'no_telp' => 'required|numeric',
            'password' => 'required|min:4|',
            'ulangi_password' => 'required|same:password',
            'peran' => 'required|not_in:pilih',
        ]);
        User::insert([
            'uuid' => uuid_create(),
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'peran' => $request->peran,
            'status' => 'aktif',
            'created_at' => now(),
        ]);
        return redirect()->route('pegawai')->with([
            'title' => 'Menambahkan Pegawai',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan data pegawai'
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'no_telp' => 'required|numeric',
            'peran' => 'required|not_in:pilih',
        ]);
        User::where('uuid', $uuid)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'peran' => $request->peran,
            'updated_at' => now()
        ]);
        return redirect()->route('pegawai')->with([
            'title' => 'Mengubah Pegawai',
            'icon' => 'success',
            'text' => 'Berhasil mengubah data pegawai'
        ]);
    }

    public function update_password(Request $request, $uuid)
    {
        $request->validate([
            'password' => 'required|min:4',
            'ulangi_password' => 'required|same:password'
        ]);
        User::where('uuid', $uuid)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('pegawai')->with([
            'title' => 'Mengubah Password Pegawai',
            'icon' => 'success',
            'text' => 'Berhasil mengubah password pegawai'
        ]);
    }

    public function hapus($uuid)
    {
        User::where('uuid', $uuid)->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'title' => 'Menghapus Pegawai',
            'icon' => 'success',
            'text' => 'Berhasil menghapus pegawai'
        ]);
    }
}

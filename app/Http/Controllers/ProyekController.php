<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        return view('proyek.index', [
            'title' => 'SPK | Proyek',
            'proyeks' => Proyek::where([
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function tambah(): View
    {
        return view('proyek.tambah', [
            'title' => 'SPK | Tambah Proyek',
        ]);
    }

    public function detail($uuid): View
    {
        return view('proyek.detail', [
            'title' => 'SPK | Detail Proyek',
            'proyek' => Proyek::where('uuid', $uuid)->first()
        ]);
    }

    public function edit($uuid): View
    {
        return view('proyek.edit', [
            'title' => 'SPK | Edit Pegawai',
            'proyek' => Proyek::where('uuid', $uuid)->first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'deadline' => 'required'
        ]);
        Proyek::insert([
            'uuid' => uuid_create(),
            'nama_proyek' => $request->nama_proyek,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'deadline' => $request->deadline,
            'created_at' => now()
        ]);
        return redirect()->route('proyek')->with([
            'title' => 'Menambahkan Proyek',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan data proyek'
        ]);
    }

    public function hapus($uuid)
    {
        Proyek::where('uuid', $uuid)->update([
            'deleted_at' => now()
        ]);
        return response()->json([
            'title' => 'Menghapus Proyek',
            'icon' => 'success',
            'text' => 'Berhasil menghapus proyek'
        ]);
    }
}

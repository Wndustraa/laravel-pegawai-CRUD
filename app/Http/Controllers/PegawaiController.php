<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = DB::table('tbpegawai')->get();
        return view('pegawai', compact('pegawai'));
    }

    public function storetambah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'umur' => 'required|integer',
            'alamat' => 'required',
        ]);

        //  Cari id terkecil yang belum terpakai (mulai dari 1)
        $existingIds = DB::table('tbpegawai')->orderBy('id')->pluck('id')->toArray();

        $nextId = 1;
        foreach ($existingIds as $id) {
            if ($id > $nextId) {
                break; // Ketemu celah > $nextId belum dipakai
            }
            $nextId = $id + 1;
        }

        //  insert dengan id yang ditemukan
        DB::table('tbpegawai')->insert([
            'id' => $nextId,
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/pegawai')->with('success', "Data berhasil ditambahkan dengan ID: {$nextId}");
    }

    public function storeupdate(Request $request, $id)
    {
        DB::table('tbpegawai')->where('id', $id)->update([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat,
            'updated_at' => now(),
        ]);

        return redirect('/pegawai');
    }

    public function destroy($id)
    {
        DB::table('tbpegawai')->where('id', $id)->delete();
        return redirect('/pegawai');
    }
}
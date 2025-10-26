<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganCon extends Controller
{
    public function index()
    {
        $golongan = DB::table('tbgolongan')->get();
        return view('golongan', compact('golongan'));
    }

    public function tambah()
    {
        return view('tambahgolongan');
    }

    public function storetambah(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gaji_pokok' => 'required|integer',
            'tunjangan_keluarga' => 'nullable|integer',
            'tunjangan_transport' => 'nullable|integer',
            'tunjangan_makan' => 'nullable|integer',
        ]);

        // 🔍 Cari ID terkecil yang belum terpakai (mulai dari 1)
        $existingIds = DB::table('tbgolongan')->orderBy('id')->pluck('id')->toArray();

        $nextId = 1;
        foreach ($existingIds as $id) {
            if ($id > $nextId) {
                break; // Ketemu celah → $nextId belum dipakai
            }
            $nextId = $id + 1;
        }

        // ✅ Insert dengan ID yang ditemukan
        DB::table('tbgolongan')->insert([
            'id' => $nextId,
            'golongan_nama' => $request->nama,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan_keluarga' => $request->tunjangan_keluarga ?? 0,
            'tunjangan_transport' => $request->tunjangan_transport ?? 0,
            'tunjangan_makan' => $request->tunjangan_makan ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/golongan')->with('success', "Data golongan berhasil ditambahkan dengan ID: {$nextId}");
    }

    public function edit($id)
    {
        $golongan = DB::table('tbgolongan')->where('id', $id)->first();
        return view('editgolongan', compact('golongan'));
    }

    public function storeupdate(Request $request, $id)
    {
        DB::table('tbgolongan')->where('id', $id)->update([
            'golongan_nama' => $request->nama,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan_keluarga' => $request->tunjangan_keluarga ?? 0,
            'tunjangan_transport' => $request->tunjangan_transport ?? 0,
            'tunjangan_makan' => $request->tunjangan_makan ?? 0,
            'updated_at' => now(),
        ]);

        return redirect('/golongan');
    }

    public function destroy($id)
    {
        DB::table('tbgolongan')->where('id', $id)->delete();
        return redirect('/golongan');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GajiCon extends Controller
{
    public function index()
    {
        $gaji = DB::table('tbgaji')
            ->join('tbpegawai', 'tbgaji.pegawai_id', '=', 'tbpegawai.id')
            ->select('tbgaji.*', 'tbpegawai.pegawai_nama')
            ->get();

        return view('gaji', compact('gaji'));
    }

    public function tambah()
    {
        $pegawai = DB::table('tbpegawai')->get(); // Untuk dropdown
        return view('tambahgaji', compact('pegawai'));
    }

    public function storetambah(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:tbpegawai,id',
            'jumlah_gaji' => 'required|integer',
            'jumlah_lembur' => 'nullable|integer',
            'potongan' => 'nullable|integer',
            'gaji_diterima' => 'required|integer',
            'tanggal_gaji' => 'required|date',
        ]);

        // 🔍 Cari ID terkecil yang belum terpakai (mulai dari 1)
        $existingIds = DB::table('tbgaji')->orderBy('id')->pluck('id')->toArray();

        $nextId = 1;
        foreach ($existingIds as $id) {
            if ($id > $nextId) {
                break; // Ketemu celah → $nextId belum dipakai
            }
            $nextId = $id + 1;
        }

        // ✅ Insert dengan ID yang ditemukan
        DB::table('tbgaji')->insert([
            'id' => $nextId,
            'pegawai_id' => $request->pegawai_id,
            'jumlah_gaji' => $request->jumlah_gaji,
            'jumlah_lembur' => $request->jumlah_lembur ?? 0,
            'potongan' => $request->potongan ?? 0,
            'gaji_diterima' => $request->gaji_diterima,
            'tanggal_gaji' => $request->tanggal_gaji,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/gaji')->with('success', "Data gaji berhasil ditambahkan dengan ID: {$nextId}");
    }

    public function edit($id)
    {
        $gaji = DB::table('tbgaji')->where('id', $id)->first();
        $pegawai = DB::table('tbpegawai')->get(); // Untuk dropdown
        return view('editgaji', compact('gaji', 'pegawai'));
    }

    public function storeupdate(Request $request, $id)
    {
        DB::table('tbgaji')->where('id', $id)->update([
            'pegawai_id' => $request->pegawai_id,
            'jumlah_gaji' => $request->jumlah_gaji,
            'jumlah_lembur' => $request->jumlah_lembur ?? 0,
            'potongan' => $request->potongan ?? 0,
            'gaji_diterima' => $request->gaji_diterima,
            'tanggal_gaji' => $request->tanggal_gaji,
            'updated_at' => now(),
        ]);

        return redirect('/gaji');
    }

    public function destroy($id)
    {
        DB::table('tbgaji')->where('id', $id)->delete();
        return redirect('/gaji');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LemburCon extends Controller
{
    public function index()
    {
        $lembur = DB::table('tblembur')
            ->join('tbpegawai', 'tblembur.pegawai_id', '=', 'tbpegawai.id')
            ->select('tblembur.*', 'tbpegawai.pegawai_nama')
            ->get();

        return view('lembur', compact('lembur'));
    }

    public function tambah()
    {
        $pegawai = DB::table('tbpegawai')->get();
        return view('tambahlembur', compact('pegawai'));
    }

    public function storetambah(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:tbpegawai,id',
            'bulan_lembur' => 'required|string|max:20',
            'jumlah_lembur' => 'required|integer|min:0',
            'total_uang_lembur' => 'required|integer|min:0',
        ]);

        // 🔍 Cari ID terkecil yang belum terpakai (mulai dari 1)
        $existingIds = DB::table('tblembur')->orderBy('id')->pluck('id')->toArray();

        $nextId = 1;
        foreach ($existingIds as $id) {
            if ($id > $nextId) {
                break; // Ketemu celah → $nextId belum dipakai
            }
            $nextId = $id + 1;
        }

        // ✅ Insert dengan ID yang ditemukan
        DB::table('tblembur')->insert([
            'id' => $nextId,
            'pegawai_id' => $request->pegawai_id,
            'bulan_lembur' => $request->bulan_lembur,
            'jumlah_lembur' => $request->jumlah_lembur,
            'total_uang_lembur' => $request->total_uang_lembur,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/lembur')->with('success', "Data lembur berhasil ditambahkan dengan ID: {$nextId}");
    }

    public function edit($id)
    {
        $lembur = DB::table('tblembur')->where('id', $id)->first();
        $pegawai = DB::table('tbpegawai')->get(); // Untuk dropdown
        return view('editlembur', compact('lembur', 'pegawai'));
    }

    public function storeupdate(Request $request, $id)
    {
        DB::table('tblembur')->where('id', $id)->update([
            'pegawai_id' => $request->pegawai_id,
            'bulan_lembur' => $request->bulan_lembur,
            'jumlah_lembur' => $request->jumlah_lembur,
            'total_uang_lembur' => $request->total_uang_lembur,
            'updated_at' => now(),
        ]);

        return redirect('/lembur');
    }

    public function destroy($id)
    {
        DB::table('tblembur')->where('id', $id)->delete();
        return redirect('/lembur');
    }
}
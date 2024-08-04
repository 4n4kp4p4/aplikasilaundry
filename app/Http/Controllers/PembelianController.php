<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pembelian;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index(): View
    {
        $pembelian = DB::table('pembelian')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pembelian.id_pegawai')
            ->select('pegawai.nama_pegawai', 'pembelian.*')
            ->get();
        return view('levelAdmin.pembelian.index', compact('pembelian'));
    }

    public function create(): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Administrator')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.pembelian.create', compact('pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_barang' => 'required',
            'id_pegawai' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        Pembelian::create([
            'kode_barang' => $request->kode_barang,
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('admin.pembelian.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View
    {
        $pembelian = DB::table('pembelian')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pembelian.id_pegawai')
            ->select('pegawai.nama_pegawai', 'pembelian.*')
            ->where('pembelian.id_pembelian', $id)
            ->first();
        return view('levelAdmin.pembelian.show', compact('pembelian'));
    }
    public function edit(string $id): View
    {
        $pembelian = Pembelian::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('levelAdmin.pembelian.edit', compact('pembelian', 'pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'kode_barang' => 'required',
            'id_pegawai' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update([
            'kode_barang' => $request->kode_barang,
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('admin.pembelian.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function destroy($id): RedirectResponse
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('admin.pembelian.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}

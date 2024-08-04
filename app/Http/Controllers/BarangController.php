<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BarangController extends Controller
{
    public function index(): View
    {
        $barang = DB::table('barang')
            ->join('pembelian', 'pembelian.kode_barang', '=', 'barang.kode_barang')
            ->select('pembelian.jumlah', 'barang.*')
            ->get();
        return view('levelAdmin.barang.index', compact('barang'));
    }

    public function create(): View
    {
        $pembelian = Pembelian::all();
        return view('levelAdmin.barang.create', compact('pembelian'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
        ]);
        return redirect()->route('admin.barang.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View
    {
        $barang = DB::table('barang')
            ->join('pembelian', 'pembelian.kode_barang', '=', 'barang.kode_barang')
            ->select('pembelian.jumlah', 'pembelian.kode_barang', 'barang.*')
            ->where('barang.id_barang', $id)
            ->first();
        return view('levelAdmin.barang.show', compact('barang'));
    }
    public function edit(string $id): View
    {
        $barang = Barang::findOrFail($id);
        $pembelian = Pembelian::all();
        return view('levelAdmin.barang.edit', compact('barang', 'pembelian'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
        ]);
        return redirect()->route('admin.barang.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function destroy($id): RedirectResponse
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('admin.barang.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}

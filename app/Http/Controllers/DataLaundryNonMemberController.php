<?php

namespace App\Http\Controllers;

use App\Models\DataLaundryNonMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataLaundryNonMemberController extends Controller
{
    public function index(): View
    {
        $dataLaundryNonMember = DB::table('data_laundry_non_member')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_non_member.id_pegawai')
            ->select('pegawai.nama_pegawai', 'data_laundry_non_member.*')
            ->get();
        return view('levelAdmin.dataLaundryNonMember.index', compact('dataLaundryNonMember'));
    }

    public function create(): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.dataLaundryNonMember.create', compact('pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'no_telp' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        DataLaundryNonMember::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'no_telp' => $request->no_telp,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.dataLaundryNonMember.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View
    {
        $dataLaundryNonMember = DB::table('data_laundry_non_member')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_non_member.id_pegawai')
            ->select('pegawai.nama_pegawai', 'data_laundry_non_member.*')
            ->where('data_laundry_non_member.no_transaksi', $id)
            ->first();
        return view('levelAdmin.dataLaundryNonMember.show', compact('dataLaundryNonMember'));
    }
    public function edit(string $id): View
    {
        $dataLaundryNonMember = DataLaundryNonMember::findOrFail($id);
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.dataLaundryNonMember.edit', compact('dataLaundryNonMember', 'pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'no_telp' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        $dataLaundryNonMember = DataLaundryNonMember::findOrFail($id);
        $dataLaundryNonMember->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'no_telp' => $request->no_telp,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.dataLaundryNonMember.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function destroy($id): RedirectResponse
    {
        $dataLaundryNonMember = DataLaundryNonMember::findOrFail($id);
        $dataLaundryNonMember->delete();
        return redirect()->route('admin.dataLaundryNonMember.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}

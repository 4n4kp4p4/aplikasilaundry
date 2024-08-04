<?php

namespace App\Http\Controllers;

use App\Models\DataLaundryMember;
use App\Models\LaundryMember;
use App\Models\Member;
use App\Models\Pegawai;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataLaundryMemberController extends Controller
{
    public function index(): View
    {
        $dataLaundryMember = DB::table('data_laundry_member')
            ->join('member', 'member.member_id', '=', 'data_laundry_member.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_member.id_pegawai')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'data_laundry_member.*')
            ->get();
        return view('levelAdmin.dataLaundryMember.index', compact('dataLaundryMember'));
    }

    public function create(): View
    {
        $member = Member::all();
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.dataLaundryMember.create', compact('member', 'pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'member_id' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        DataLaundryMember::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.dataLaundryMember.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function show(string $id): View
    {
        $dataLaundryMember = DB::table('data_laundry_member')
            ->join('member', 'member.member_id', '=', 'data_laundry_member.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_member.id_pegawai')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'data_laundry_member.*')
            ->where('data_laundry_member.no_transaksi', $id)
            ->first();
        return view('levelAdmin.dataLaundryMember.show', compact('dataLaundryMember'));
    }
    public function edit(string $id): View
    {
        $dataLaundryMember = DataLaundryMember::findOrFail($id);
        $member = Member::all();
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->where('users.level', 'Karyawan')
            ->select('pegawai.id_pegawai', 'pegawai.nama_pegawai')
            ->get();
        return view('levelAdmin.dataLaundryMember.edit', compact('dataLaundryMember', 'member', 'pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required',
            'member_id' => 'required',
            'id_pegawai' => 'required',
            'keterangan' => 'required',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required',
        ]);

        $dataLaundryMember = DataLaundryMember::findOrFail($id);
        $dataLaundryMember->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);
        return redirect()->route('admin.dataLaundryMember.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function destroy($id): RedirectResponse
    {
        $dataLaundryMember = DataLaundryMember::findOrFail($id);
        $dataLaundryMember->delete();
        return redirect()->route('admin.dataLaundryMember.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}

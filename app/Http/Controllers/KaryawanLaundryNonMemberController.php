<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class KaryawanLaundryNonMemberController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $dataLaundryNonMember = DB::table('data_laundry_non_member')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_non_member.id_pegawai')
            ->select('pegawai.nama_pegawai', 'data_laundry_non_member.*')
            ->get();
        return view('levelKaryawan.dataLaundryNonMember.index', compact('dataLaundryNonMember'));
    }

    public function show(string $id): View
    {
        $dataLaundryNonMember = DB::table('data_laundry_non_member')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_non_member.id_pegawai')
            ->select('pegawai.nama_pegawai', 'data_laundry_non_member.*')
            ->where('data_laundry_non_member.no_transaksi', $id)
            ->first();
        return view('levelKaryawan.dataLaundryNonMember.show', compact('dataLaundryNonMember'));
    }
}

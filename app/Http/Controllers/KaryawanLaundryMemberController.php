<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class KaryawanLaundryMemberController extends Controller
{
    public function index(): View
    {
        $id = auth()->user()->id;
        $dataLaundryMember = DB::table('data_laundry_member')
            ->join('member', 'member.member_id', '=', 'data_laundry_member.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_member.id_pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'data_laundry_member.*')
            ->where('users.id', $id)
            ->get();
        return view('levelKaryawan.dataLaundryMember.index', compact('dataLaundryMember'));
    }

    public function show(string $id): View
    {
        $dataLaundryMember = DB::table('data_laundry_member')
            ->join('member', 'member.member_id', '=', 'data_laundry_member.member_id')
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'data_laundry_member.id_pegawai')
            ->select('member.nama_member', 'pegawai.nama_pegawai', 'data_laundry_member.*')
            ->where('data_laundry_member.no_transaksi', $id)
            ->first();
        return view('levelKaryawan.dataLaundryMember.show', compact('dataLaundryMember'));
    }
}

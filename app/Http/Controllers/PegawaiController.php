<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->select('users.email', 'users.level', 'pegawai.*')
            ->get();
        return view('levelAdmin.pegawai.index', compact('pegawai'));
    }

    public function create(): View
    {
        $user = User::whereIn('level', ['Administrator', 'Supervisi', 'Karyawan'])->get();
        return view('levelAdmin.pegawai.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required',
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        pegawai::create([
            'user_id' => $request->user_id,
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'users.id', '=', 'pegawai.user_id')
            ->select('users.email', 'users.level', 'pegawai.*')
            ->where('pegawai.id_pegawai', $id)
            ->first();
        return view('levelAdmin.pegawai.show', compact('pegawai'));
    }

    public function edit(string $id): View
    {
        $pegawai = Pegawai::findOrFail($id);
        $user = User::where('level', ['Administrator', 'Supervisi', 'Karyawan'])->get();
        return view('levelAdmin.pegawai.edit',  compact('pegawai', 'user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy($id): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PegawaiController extends Controller
{
    public function index(): View
    {
       $dataPegawai = Pegawai::latest()->paginate(10);
       return view('pegawai.index',compact('dataPegawai'));
    }

    public function create(): View
    {
        return view('pegawai.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'pegawai_id'        => 'required',
            'nama_pegawai'      => 'required',
            'alamat'            => 'required',
            'jenis_kelamin'     => 'required',
            'jabatan'           => 'required',
            'status'            => 'required',
        ]);

        Pegawai::create([
            'pegawai_id'          => $request->pegawai_id,
            'nama_pegawai'        => $request->nama_pegawai,
            'alamat'              => $request->alamat,
            'jenis_kelamin'       => $request->jenis_kelamin,
            'jabatan'             => $request->jabatan,
            'status'              => $request->status,



        ]);
        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataPegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('dataPegawai'));
    }

    public function show(string $id): View
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('pegawai.show', compact('pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'pegawai_id'        => 'required',
            'nama_pegawai'      => 'required',
            'alamat'            => 'required',
            'jenis_kelamin'     => 'required',
            'jabatan'           => 'required',
            'status'            => 'required',

        ]);

        $dataPegawai = Pegawai::findOrFail($id);
        $dataPegawai->update([
             'pegawai_id'    => $request->pegawai_id,
             'nama_pegawai'  => $request->nama_pegawai,
             'alamat'        => $request->alamat,
             'jenis_kelamin' => $request->jenis_kelamin,
             'jabatan'       => $request->jabatan,
             'status'        => $request->status,
            ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
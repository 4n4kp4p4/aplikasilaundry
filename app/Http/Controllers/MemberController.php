<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function index(): View
    {
       $dataMember = Member::latest()->paginate(10);
       return view('member.index',compact('dataMember'));
    }

    public function create(): View
    {
        return view('member.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_member'      => 'required|min:2|unique:member,nama_member'
        ]);

        Pegawai::create([
            'nama_member'        => $request->nama_member,
            
        ]);
        //redirect to index
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataMember = Member::findOrFail($id);
        return view('member.edit', compact('dataMember'));
    }

    public function show(string $id): View
    {
        $member = Member::findOrFail($id);

        return view('member.show', compact('member'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_member'      => 'required|min:2'
        ]);

        $dataMember = Member::findOrFail($id);
        $dataMember->update([
             'nama_member'  => $request->nama_member
            ]);

        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
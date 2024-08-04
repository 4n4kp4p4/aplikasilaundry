<?php

namespace App\Http\Controllers;

use App\Models\LaundryMember;
use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(): View
    {
        $member = Member::all();
        return view('levelAdmin.member.index', compact('member'));
    }
    public function create(): View
    {
        $user = User::where('level', 'Member')->get();
        return view('levelAdmin.member.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_member' => 'required',
            'no_identitas' => 'required|unique:member,no_identitas',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tgl_join' => 'required',
        ]);

        Member::create([
            'nama_member' => $request->nama_member,
            'no_identitas' => $request->no_identitas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tgl_join' => $request->tgl_join,
        ]);
        return redirect()->route('admin.member.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }
    public function edit(string $id): View
    {
        $member = Member::findOrFail($id);
        return view('levelAdmin.member.edit',  compact('member'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'no_identitas' => 'required',
            'nama_member' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tgl_join' => 'required',

        ]);

        $member = Member::findOrFail($id);
        $member->update([
            'no_identitas' => $request->no_identitas,
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tgl_join' => $request->tgl_join,
        ]);
        return redirect()->route('admin.member.index')->with(['success' => 'Data Berhasil Diedit']);
    }
    public function show(string $id): View
    {
        $member = Member::findOrFail($id);
        return view('levelAdmin.member.show', compact('member'));
    }

    public function destroy($id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('admin.member.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}

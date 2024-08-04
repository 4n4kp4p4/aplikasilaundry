<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $user = User::latest()->paginate(10);
        return view('levelAdmin.user.index', compact('user'));
    }

    public function create(): View
    {
        return view('levelAdmin.user.create');
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'username'      => 'required|min:5|unique:users,username',
            'email'         => 'required|min:5|unique:users,email|email',
            'password'      => 'required|min:5',
            'level'         => 'required'
        ]);

        User::create([
            'username'          => $request->username,
            'email'             => $request->email,
            'password'          => Hash::make($request['password']),
            'level'             => $request->level,
        ]);
        //redirect to index
        return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $user = User::findOrFail($id);

        return view('levelAdmin.user.show', compact('user'));
    }

    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('levelAdmin.user.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'username'      => 'required|min:5',
            'password'      => 'required|min:5',
            'level'         => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'username'  => $request->username,
            'password'  => Hash::make($request['password']),
            'level'     => $request->level
        ]);

        return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

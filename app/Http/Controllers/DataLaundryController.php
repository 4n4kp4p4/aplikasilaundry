<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\DataLaundry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DataLaundryController extends Controller
{
    public function index(): View
    {
       $dataDataLaundry = DataLaundry::latest()->paginate(10);
       return view('datalaundry.index',compact('dataDataLaundry'));
    }

    public function create(): View
    {
        return view('datalaundry.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_datalaundry'      => 'required|min:2|unique:datalaundry,datalaundry'
        ]);

        DataLaundry::create([
            'nama_datalaundry'        => $request->nama_datalaundry,
        ]);
        //redirect to index
        return redirect()->route('datalaundry.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataDataLaundry = DataLaundry::findOrFail($id);
        return view('datalaundry.edit', compact('dataDataLaundry'));
    }

    public function show(string $id): View
    {
        $datalaundry = DataLaundry::findOrFail($id);

        return view('datalaundry.show', compact('datalaundry'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_datalaundry'      => 'required|min:2'
        ]);

        $dataDataLaundry = DataLaundry::findOrFail($id);
        $dataDataLaundry->update([
             'nama_datalaundry'  => $request->nama_datalaundry
            ]);

        return redirect()->route('datalaundry.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $datalaundry = DataLaundry::findOrFail($id);
        $datalaundry->delete();
        return redirect()->route('datalaundry.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
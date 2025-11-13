<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;

class HomestayController extends Controller
{
    public function index()
    {
        $homestays = Homestay::all();
        return view('homestay.index', compact('homestays'));
    }

    public function create()
    {
        return view('homestay.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'harga_per_malam' => 'required|numeric|min:0',
            'fasilitas' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        Homestay::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'fasilitas' => $request->fasilitas,
            'harga_per_malam' => $request->harga_per_malam,
            'status' => $request->status,
        ]);

        return redirect('/homestay')->with('success', 'Data homestay berhasil ditambahkan');
    }

    public function edit(Homestay $homestay)
    {
        return view('homestay.edit', compact('homestay'));
    }

    public function update(Request $request, Homestay $homestay)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'harga_per_malam' => 'required|numeric|min:0',
            'status' => 'required|string',
        ]);

        $homestay->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'fasilitas' => $request->fasilitas,
            'harga_per_malam' => $request->harga_per_malam,
            'status' => $request->status,
        ]);

        return redirect('/homestay')->with('success', 'Data homestay berhasil diperbarui');
    }

    public function destroy(Homestay $homestay)
    {
        $homestay->delete();
        return redirect('/homestay')->with('success', 'Data homestay berhasil dihapus');
    }
}

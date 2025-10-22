<?php

namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinasiWisataController extends Controller
{
    public function index(Request $request)
    {
        $query = DestinasiWisata::query();

        if ($request->has('q')) {
            $q = $request->q;
            $query->where('nama', 'like', "%$q%")
                  ->orWhere('alamat', 'like', "%$q%")
                  ->orWhere('kontak', 'like', "%$q%");
        }

        $data = $query->latest()->paginate(10);
        return view('destinasi.index', compact('data'));
    }

    public function create()
    {
        return view('destinasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
        ]);

        DestinasiWisata::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'jam_buka' => $request->jam_buka,
            'deskripsi' => $request->deskripsi,
            'tiket' => $request->tiket,
        ]);

        return redirect()->route('destinasi.index')->with('success', 'Data destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = DestinasiWisata::findOrFail($id);
        return view('destinasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = DestinasiWisata::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'jam_buka' => 'nullable|string|max:50',
            'tiket' => 'nullable|numeric',
            'kontak' => 'nullable|string|max:50',
        ]);

        $data->update([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'jam_buka' => $request->jam_buka,
            'deskripsi' => $request->deskripsi,
            'tiket' => $request->tiket,
        ]);

        return redirect()->route('destinasi.index')->with('success', 'Data destinasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = DestinasiWisata::findOrFail($id);
        $data->delete();
        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}

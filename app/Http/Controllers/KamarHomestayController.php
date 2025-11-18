<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\KamarHomestay;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarHomestayController extends Controller
{
    public function index()
    {
        $data = KamarHomestay::with('homestay', 'media')->latest()->get();
        return view('kamar.index', compact('data'));
    }

    public function create()
    {
        $homestay = Homestay::all();
        return view('kamar.create', compact('homestay'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required',
            'nama_kamar' => 'required',
            'kapasitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'fasilitas_json' => 'nullable|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        $kamar = KamarHomestay::create([
            'homestay_id' => $request->homestay_id,
            'nama_kamar' => $request->nama_kamar,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'fasilitas_json' => $request->fasilitas_json,
        ]);

        // ===== Foto Upload =====
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('kamar', 'public');

            Media::create([
                'ref_table' => 'kamar_homestay',
                'ref_id' => $kamar->kamar_id,
                'file_url' => $path,
                'caption' => $request->nama_kamar,
                'mime_type' => $request->file('foto')->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kamar = KamarHomestay::with('media')->findOrFail($id);
        $homestay = Homestay::all();
        return view('kamar.edit', compact('kamar', 'homestay'));
    }

    public function update(Request $request, $id)
    {
        $kamar = KamarHomestay::findOrFail($id);

        $request->validate([
            'homestay_id' => 'required',
            'nama_kamar' => 'required',
            'kapasitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'fasilitas_json' => 'nullable|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        $kamar->update([
            'homestay_id' => $request->homestay_id,
            'nama_kamar' => $request->nama_kamar,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'fasilitas_json' => $request->fasilitas_json,
        ]);

        // Update foto
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($kamar->media->first()) {
                Storage::disk('public')->delete($kamar->media->first()->file_url);
                $kamar->media->first()->delete();
            }

            $path = $request->file('foto')->store('kamar', 'public');

            Media::create([
                'ref_table' => 'kamar_homestay',
                'ref_id' => $kamar->kamar_id,
                'file_url' => $path,
                'caption' => $request->nama_kamar,
                'mime_type' => $request->file('foto')->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kamar = KamarHomestay::findOrFail($id);

        if ($kamar->media->first()) {
            Storage::disk('public')->delete($kamar->media->first()->file_url);
            $kamar->media->first()->delete();
        }

        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus!');
    }
}

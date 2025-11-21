<?php
namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\KamarHomestay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarHomestayController extends Controller
{
    public function index()
    {
        $data = KamarHomestay::with('homestay')->paginate(10);
        return view('kamar.index', compact('data'));
    }

    public function create()
    {
        $homestays = Homestay::all();
        return view('kamar.create', compact('homestays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required',
            'nama_kamar'  => 'required',
            'kapasitas'   => 'required|numeric',
            'harga'       => 'required|numeric',
            'media'       => 'image|max:2048',
        ]);

        $file = null;
        if ($request->hasFile('media')) {
            $file = $request->file('media')->store('kamar', 'public');
        }

        KamarHomestay::create([
            'homestay_id'    => $request->homestay_id,
            'nama_kamar'     => $request->nama_kamar,
            'kapasitas'      => $request->kapasitas,
            'harga'          => $request->harga,
            'fasilitas_json' => json_encode($request->fasilitas ?? []),
            'media'          => $file
        ]);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kamar     = KamarHomestay::findOrFail($id);
        $homestays = Homestay::all();
        return view('kamar.edit', compact('kamar', 'homestays'));
    }

    public function update(Request $request, $id)
    {
        $kamar = KamarHomestay::findOrFail($id);

        $request->validate([
            'homestay_id' => 'required',
            'nama_kamar'  => 'required',
            'kapasitas'   => 'required|numeric',
            'harga'       => 'required|numeric',
            'media'       => 'image|max:2048',
        ]);

        $file = $kamar->media;

        if ($request->hasFile('media')) {
            if ($file) {
                Storage::disk('public')->delete($file);
            }

            $file = $request->file('media')->store('kamar', 'public');
        }

        $kamar->update([
            'homestay_id'    => $request->homestay_id,
            'nama_kamar'     => $request->nama_kamar,
            'kapasitas'      => $request->kapasitas,
            'harga'          => $request->harga,
            'fasilitas_json' => json_encode($request->fasilitas ?? []),
            'media'          => $file
        ]);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kamar = KamarHomestay::findOrFail($id);

        if ($kamar->media) {
            Storage::disk('public')->delete($kamar->media);
        }

        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus');
    }

    public function show($id)
    {
        $kamar = KamarHomestay::with(['homestay', 'media'])->findOrFail($id);

        // Decode fasilitas JSON
        $kamar->fasilitas = json_decode($kamar->fasilitas_json, true) ?? [];

        return view('kamar.show', compact('kamar'));
    }

}

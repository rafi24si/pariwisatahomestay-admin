<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\Media;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomestayController extends Controller
{
    public function index()
    {
        $homestays = Homestay::with('media')->get();
        return view('homestay.index', compact('homestays'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('homestay.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemilik_warga_id' => 'required|integer',
            'nama'             => 'required|string',
            'alamat'           => 'required|string',
            'rt'               => 'required|string',
            'rw'               => 'required|string',
            'fasilitas'        => 'nullable|array',
            'harga_per_malam'  => 'required|numeric',
            'status'           => 'required|string',
            'foto.*'           => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $fasilitasJson = json_encode($request->fasilitas ?? []);

            $homestay = Homestay::create([
                'pemilik_warga_id' => $request->pemilik_warga_id,
                'nama'             => $request->nama,
                'alamat'           => $request->alamat,
                'rt'               => $request->rt,
                'rw'               => $request->rw,
                'fasilitas_json'   => $fasilitasJson,
                'harga_per_malam'  => $request->harga_per_malam,
                'status'           => $request->status,
            ]);

            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $i => $file) {

                    $path = $file->store('uploads/homestay', 'public');

                    Media::create([
                        'ref_table'  => 'homestay',
                        'ref_id'     => $homestay->homestay_id,
                        'file_url'   => $path,
                        'caption'    => 'Foto Homestay ' . ($i + 1),
                        'mime_type'  => $file->getMimeType(),
                        'sort_order' => $i,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('homestay.index')->with('success', 'Homestay berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $homestay = Homestay::with('media')->findOrFail($id);
        return view('homestay.show', compact('homestay'));
    }

    public function edit($id)
    {
        $homestay = Homestay::findOrFail($id);
        $warga    = Warga::all();

        // decode fasilitas_json → array
        $homestay->fasilitas = json_decode($homestay->fasilitas_json, true) ?? [];

        // kirim 2 variabel
        return view('homestay.edit', compact('homestay', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pemilik_warga_id' => 'required|integer',
            'nama'             => 'required|string',
            'alamat'           => 'required|string',
            'rt'               => 'required|string',
            'rw'               => 'required|string',
            'fasilitas'        => 'nullable|array',
            'harga_per_malam'  => 'required|numeric',
            'status'           => 'required|string',
            'foto.*'           => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $homestay = Homestay::findOrFail($id);

            $fasilitasJson = json_encode($request->fasilitas ?? []);

            $homestay->update([
                'pemilik_warga_id' => $request->pemilik_warga_id,
                'nama'             => $request->nama,
                'alamat'           => $request->alamat,
                'rt'               => $request->rt,
                'rw'               => $request->rw,
                'fasilitas_json'   => $fasilitasJson,
                'harga_per_malam'  => $request->harga_per_malam,
                'status'           => $request->status,
            ]);

            if ($request->hasFile('foto')) {

                foreach ($homestay->media as $m) {
                    Storage::disk('public')->delete($m->file_url);
                    $m->delete();
                }

                foreach ($request->file('foto') as $i => $file) {

                    $path = $file->store('uploads/homestay', 'public');

                    Media::create([
                        'ref_table'  => 'homestay',
                        'ref_id'     => $homestay->homestay_id,
                        'file_url'   => $path,
                        'caption'    => 'Foto Homestay ' . ($i + 1),
                        'mime_type'  => $file->getMimeType(),
                        'sort_order' => $i,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('homestay.index')->with('success', 'Homestay berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $homestay = Homestay::findOrFail($id);

        foreach ($homestay->media as $m) {
            Storage::disk('public')->delete($m->file_url);
            $m->delete();
        }

        $homestay->delete();

        return redirect()->route('homestay.index')->with('success', 'Homestay berhasil dihapus!');
    }
}

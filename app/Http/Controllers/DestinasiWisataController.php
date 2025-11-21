<?php
namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Media; // [MEDIA]
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinasiWisataController extends Controller
{
    public function index(Request $request)
    {
        $query = DestinasiWisata::query();

        if ($request->has('q')) {
            $q = $request->q;
            $query->where(function ($x) use ($q) {
                $x->where('nama', 'like', "%$q%")
                    ->orWhere('alamat', 'like', "%$q%")
                    ->orWhere('kontak', 'like', "%$q%");
            });
        }

        // Pagination 10 data per halaman
        $data = DestinasiWisata::paginate(10);
        return view('destinasi.index', compact('data'));
    }

    public function create()
    {
        return view('destinasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
        ]);

        $destinasi = DestinasiWisata::create([
            'nama'      => $request->nama,
            'kontak'    => $request->kontak,
            'alamat'    => $request->alamat,
            'rt'        => $request->rt,
            'rw'        => $request->rw,
            'jam_buka'  => $request->jam_buka,
            'deskripsi' => $request->deskripsi,
            'tiket'     => $request->tiket,
        ]);

        // [MEDIA] — simpan foto jika ada
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('uploads/destinasi', 'public');

            Media::create([
                'ref_table'  => 'destinasi_wisata',
                'ref_id'     => $destinasi->destinasi_id,
                'file_url'   => $path,
                'caption'    => $request->caption,
                'mime_type'  => $request->file('media')->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

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
            'nama'      => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat'    => 'nullable|string',
            'rt'        => 'nullable|string|max:10',
            'rw'        => 'nullable|string|max:10',
            'jam_buka'  => 'nullable|string|max:50',
            'tiket'     => 'nullable|numeric',
            'kontak'    => 'nullable|string|max:50',
        ]);

        $data->update([
            'nama'      => $request->nama,
            'kontak'    => $request->kontak,
            'alamat'    => $request->alamat,
            'rt'        => $request->rt,
            'rw'        => $request->rw,
            'jam_buka'  => $request->jam_buka,
            'deskripsi' => $request->deskripsi,
            'tiket'     => $request->tiket,
        ]);

        // [MEDIA] — update foto
        if ($request->hasFile('media')) {

            // hapus media lama
            $oldMedia = Media::where('ref_table', 'destinasi_wisata')
                ->where('ref_id', $id)
                ->first();

            if ($oldMedia) {
                Storage::disk('public')->delete($oldMedia->file_url);
                $oldMedia->delete();
            }

            // tambah media baru
            $path = $request->file('media')->store('uploads/destinasi', 'public');

            Media::create([
                'ref_table'  => 'destinasi_wisata',
                'ref_id'     => $id,
                'file_url'   => $path,
                'caption'    => $request->caption,
                'mime_type'  => $request->file('media')->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('destinasi.index')->with('success', 'Data destinasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = DestinasiWisata::findOrFail($id);

        // [MEDIA] — hapus file & record media
        $media = Media::where('ref_table', 'destinasi_wisata')
            ->where('ref_id', $id)
            ->get();

        foreach ($media as $m) {
            Storage::disk('public')->delete($m->file_url);
            $m->delete();
        }

        $data->delete();

        return redirect()->route('destinasi.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}

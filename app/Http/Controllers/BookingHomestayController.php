<?php
namespace App\Http\Controllers;

use App\Models\BookingHomestay;
use App\Models\Homestay;
use App\Models\KamarHomestay;
use App\Models\Media;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingHomestayController extends Controller
{
    /* =======================================================
        📌 LIST BOOKING
    ======================================================== */
    public function index(Request $request)
    {
        $filters = [
            'status'       => $request->status,
            'metode_bayar' => $request->metode_bayar,
        ];

        $booking = BookingHomestay::with(['kamar.homestay', 'warga', 'media'])
            ->search($request->search)
            ->filter($filters)
            ->orderBy('booking_id', 'DESC')
            ->paginate(3)
            ->withQueryString();

        return view('booking.index', compact('booking', 'filters'));
    }

    /* =======================================================
        📌 CREATE FORM
    ======================================================== */
    public function create()
    {
        return view('booking.create', [
            'homestay' => Homestay::orderBy('nama')->get(),
            'warga'    => Warga::orderBy('nama')->get(),
        ]);
    }

    /* =======================================================
        📌 GET KAMAR BY HOMESTAY (AJAX)
    ======================================================== */
    public function getKamar($homestay_id)
    {
        return KamarHomestay::where('homestay_id', $homestay_id)
            ->select('kamar_id', 'nama_kamar', 'kapasitas', 'harga')
            ->get();
    }

    /* =======================================================
        📌 CALENDAR — BLOCKED DATES
    ======================================================== */
    public function calendar($kamar_id)
    {
        $bookings = BookingHomestay::where('kamar_id', $kamar_id)->get();

        $disableDates = [];
        foreach ($bookings as $b) {
            $start = strtotime($b->checkin);
            $end   = strtotime($b->checkout);

            for ($t = $start; $t <= $end; $t += 86400) {
                $disableDates[] = date('Y-m-d', $t);
            }
        }

        return response()->json([
            'disable_dates' => $disableDates,
            'min_date'      => date('Y-m-d'),
        ]);
    }

    /* =======================================================
        📌 STORE BOOKING
    ======================================================== */
    public function store(Request $request)
    {
        $request->validate([
            'kamar_id'     => 'required|exists:kamar_homestay,kamar_id',
            'warga_id'     => 'required|exists:warga,warga_id',
            'checkin'      => 'required|date',
            'checkout'     => 'required|date|after:checkin',
            'metode_bayar' => 'required|in:transfer,cash',
            'bukti_bayar'  => 'nullable|image|max:2048',
        ]);

        $kamar = KamarHomestay::findOrFail($request->kamar_id);

        $hari  = (strtotime($request->checkout) - strtotime($request->checkin)) / 86400;
        $hari  = max(1, $hari);
        $total = $hari * $kamar->harga;

        $booking = BookingHomestay::create([
            'kamar_id'     => $request->kamar_id,
            'warga_id'     => $request->warga_id,
            'checkin'      => $request->checkin,
            'checkout'     => $request->checkout,
            'metode_bayar' => $request->metode_bayar,
            'total'        => $total,
            'status'       => 'pending',
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $path = $request->bukti_bayar->store('booking_homestay', 'public');

            Media::create([
                'ref_table'  => 'booking_homestay',
                'ref_id'     => $booking->booking_id,
                'file_url'   => $path,
                'mime_type'  => $request->bukti_bayar->getClientMimeType(),
                'caption'    => 'Bukti Pembayaran',
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil dibuat.');
    }

    /* =======================================================
        📌 EDIT FORM
    ======================================================== */
    public function edit($id)
    {
        return view('booking.edit', [
            'booking'  => BookingHomestay::with(['media', 'kamar.homestay', 'warga'])->findOrFail($id),
            'homestay' => Homestay::orderBy('nama')->get(),
            'kamar'    => KamarHomestay::orderBy('nama_kamar')->get(),
            'warga'    => Warga::orderBy('nama')->get(),
        ]);
    }

    /* =======================================================
        📌 UPDATE BOOKING
    ======================================================== */
    public function update(Request $request, $id)
    {
        $booking = BookingHomestay::with('media')->findOrFail($id);

        $request->validate([
            'status'       => 'required|in:pending,lunas,batal',
            'metode_bayar' => 'required|in:transfer,cash',
            'bukti_bayar'  => 'nullable|image|max:2048',
        ]);

        $booking->update([
            'status'       => $request->status,
            'metode_bayar' => $request->metode_bayar,
        ]);

        if ($request->hasFile('bukti_bayar')) {

            if ($booking->media) {
                Storage::disk('public')->delete($booking->media->file_url);
                $booking->media->delete();
            }

            $path = $request->bukti_bayar->store('booking_homestay', 'public');

            Media::create([
                'ref_table'  => 'booking_homestay',
                'ref_id'     => $booking->booking_id,
                'file_url'   => $path,
                'mime_type'  => $request->bukti_bayar->getClientMimeType(),
                'caption'    => 'Bukti Pembayaran Baru',
                'sort_order' => 1,
            ]);
        }

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    /* =======================================================
        📌 DELETE BOOKING
    ======================================================== */
    public function destroy($id)
    {
        $booking = BookingHomestay::with('media')->findOrFail($id);

        if ($booking->media) {
            Storage::disk('public')->delete($booking->media->file_url);
            $booking->media->delete();
        }

        $booking->delete();

        return back()->with('success', 'Booking berhasil dihapus.');
    }

    /* =======================================================
        📌 TOGGLE LUNAS / BELUM LUNAS
        (FITUR BARU — TIDAK MENGGANGGU LOGIKA LAIN)
    ======================================================== */
    public function toggleLunas($id)
    {
        $booking = BookingHomestay::findOrFail($id);

        $booking->status = $booking->status === 'lunas' ? 'pending' : 'lunas';
        $booking->save();

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}

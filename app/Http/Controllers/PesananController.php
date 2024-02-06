<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Pesanan::query();
        $pesanan = Pesanan::all();
        $pembayaran = Pembayaran::all();


        if (auth()->user()->role == 'Admin') {
            return view('pesanan_admin', compact('data', 'pesanan','pembayaran'));
        } else {
            return view('pesanan', compact('data', 'pesanan','pembayaran'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

    // Periksa apakah file 'bukti' diunggah
    if ($request->hasFile('bukti')) {
        $bukti = $request->file('bukti');
        $buktiName = Str::random(20) . '.' . $bukti->getClientOriginalExtension();

        // Simpan file tersebut
        Storage::disk('public')->put($buktiName, file_get_contents($bukti));

        // Buat catatan Pembayaran baru
        Pembayaran::create([
            'pesanan_id' => $id,
            'bukti' => $buktiName
        ]);

        // Perbarui status Pesanan menjadi "Menunggu Konfirmasi"
        $pesanan->update(['status' => 'Menunggu Konfirmasi']);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Bukti berhasil dikirim, silahkan tunggu konfirmasi');
    }

    // Jika file 'bukti' tidak diunggah, redirect kembali dengan pesan error
    return redirect()->back()->with('error', 'Mohon unggah bukti pembayaran terlebih dahulu');
    }

    public function updateStatus(Request $request, $id)
    {
        $buktiPembayaran = $request->file('bukti');
        $status = $buktiPembayaran ? 'menunggu konfirmasi' : 'bayar sekarang';

        // Setelah berhasil, perbarui status
        $pesanan = Pesanan::find($id);
        $pesanan->status = $status;
        $pesanan->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}

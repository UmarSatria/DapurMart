<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::paginate(5);
        $kategori =Kategori::all();
        return view('barang', compact('data', 'kategori'));
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
        // Barang::create($request->all());
        // return to_route('barang.index')->with('success', 'Data berhasil ditambahkan');

        $data = $request->all();
        $gambar = $request->file('gambar_produk');
        $data['gambar_produk'] = Str::random(20) . '.' . $gambar->getClientOriginalExtension();
        Storage::disk('public')->put($data['gambar_produk'], file_get_contents($gambar));
        Barang::create($data);

        return to_route('barang.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->all();
        if ($request->hasFile('gambar_produk')) {
            $gambar_produk = $request->file('gambar_produk');
            $data['gambar_produk'] = Str::random(20) . '.' . $gambar_produk->getClientOriginalExtension();
            Storage::disk('public')->put($data['gambar_produk'], file_get_contents($gambar_produk));
            Storage::disk('public')->delete($barang->gambar_produk);
        } else {
            $data['gambar_produk'] = $barang->gambar_produk;
        }

        $barang->update($data);
        return redirect()->back()->with('success', 'Berhasil update data');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Barang::findOrFail($id);
            $data->delete();

            return redirect()->route('barang.index')->with('success', 'Berhasil menghapus data.');

        } catch (Exception $e) {
            // Tangkap dan tangani eksepsi di sini

            return redirect()->route('barang.index')->with('warning', 'Gagal menghapus data karena data masih digunakan.');
        }
    }
}

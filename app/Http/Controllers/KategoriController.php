<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
        return view('kategori', compact('data'));
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
    public function store(KategoriRequest $request)
    {
        Kategori::create($request->all());
        return to_route('kategori.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, $id)
    {
        // Validasi data
        $request->validate([
            'kategori' => 'required',
        ]);

        // Temukan data yang akan diubah
        $kategori = Kategori::findOrFail($id);

        // Update data
        $kategori->update([
            'kategori' => $request->input('kategori'),
        ]);

        // Redirect atau tindakan lain setelah pembaruan
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Kategori::findOrFail($id);
            $data->delete();

            return redirect()->route('kategori.index')->with('success', 'Berhasil menghapus data.');

        } catch (Exception $e) {
            // Tangkap dan tangani eksepsi di sini

            return redirect()->route('kategori.index')->with('warning', 'Gagal menghapus data karena data masih digunakan.');
        }
    }
}

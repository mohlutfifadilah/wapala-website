<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('admin.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('admin.kategori.kategori_add', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Kategori::create([
            'nama_kategori' => $request->kategori,
        ]);

        return redirect()->route('kategori.index')->withSuccess('Data Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::find($id);
        return view('admin.kategori.kategori_edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kategori = Kategori::find($id);

        $kategori->update([
            'nama_kategori' => $request->kategori,
        ]);

        return redirect()->route('kategori.index')->withSuccess('Data Kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Temukan kategori berdasarkan ID
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->back()->withErrors('Kategori tidak ditemukan.');
        }

        // Ambil semua galeri yang terkait dengan kategori yang akan dihapus
        $galeriList = Galeri::where('id_kategori', $id)->get();

        // Iterasi setiap galeri dan hapus foto serta row galeri
        foreach ($galeriList as $galeri) {
            // Cek apakah foto galeri ada
            if ($galeri->foto) {
                // Hapus file dari storage lokal (dari storage dan public path)
                $storagePath = storage_path('app/galeri/' . $galeri->foto);
                $publicPath = public_path('storage/galeri/' . $galeri->foto);

                // Cek apakah file ada di lokasi storage dan public sebelum menghapusnya
                if (file_exists($storagePath)) {
                    unlink($storagePath);
                }

                if (file_exists($publicPath)) {
                    unlink($publicPath);
                }
            }

            // Hapus galeri dari database
            $galeri->delete();
        }

        // Hapus kategori setelah galeri yang terkait sudah dihapus
        $kategori->delete();

        return redirect()->route('kategori.index')->withSuccess('Data Kategori berhasil dihapus');
    }
}

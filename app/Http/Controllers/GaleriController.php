<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galeri = Galeri::all();
        $segment = request()->segment(1);
        if ($segment===null){
            $segment = '/galeri';
        }
        if(!Auth::check()){
            $kategori = Kategori::all();
            return view('galeri',compact('galeri', 'segment', 'kategori'));
        }
        $kategori = Kategori::all()->count();
        if($kategori === 0){
            return redirect()->back()->with('error', 'Tambahkan kategori terlebih dahulu');
        }
        return view('admin.galeri.index',compact('galeri'));
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
        return view('admin.galeri.galeri_add', compact('kategori'));
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
        if (is_null($request->kategori)) {
            return redirect()->route('galeri.create')->with('error', 'Kategori harus diisi');
        }

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();
            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024 || $fileSize === False) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('error', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('galeri');
            $file->move('storage/galeri/', $image);
            $image = str_replace('galeri/', '', $image);
        } else {
            $image = '';
        }
        Galeri::create([
            'foto' => $image,
            'id_kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('galeri.index')->withSuccess('Data Galeri berhasil ditambahkan');
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
        $galeri = Galeri::find($id);
        $kategori = Kategori::all();
        return view('admin.galeri.galeri_edit', compact('galeri','kategori'));
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
        $galeri = Galeri::find($id);

        $kategori = Kategori::find($galeri->id_kategori);
        if ($request->kategori){
          $id_kategori = $request->kategori;
        } else {
          $id_kategori = $kategori->id;
        }

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('error', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('galeri');
            $file->move('storage/galeri/', $image);
            $image = str_replace('galeri/', '', $image);
            if($galeri->foto){
                unlink(storage_path('app/galeri/' . $galeri->foto));
                unlink(public_path('storage/galeri/' . $galeri->foto));
            }
        } else {
            $image = $galeri->foto;
        }

        $galeri->update([
            'id_kategori' => $id_kategori,
            'foto' => $image,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('galeri.index')->withSuccess('Data Galeri berhasil diedit');
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
        $galeri = Galeri::find($id);
        if($galeri->foto){
            unlink(storage_path('app/galeri/' . $galeri->foto));
            unlink(public_path('storage/galeri/' . $galeri->foto));
          }
        $galeri->delete();

        return redirect()->route('galeri.index')->withSuccess('Data Galeri berhasil dihapus');
    }
}

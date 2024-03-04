<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $divisi = Divisi::all();
        return view('admin.divisi.index',compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.divisi.divisi_add');
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
        if ($request->file('logo')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('logo')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('error', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('logo');
            $image = $request->file('logo')->store('logo-divisi');
            $file->move('storage/logo-divisi/', $image);
            $image = str_replace('logo-divisi/', '', $image);
        } else {
            $image = '';
        }

        Divisi::create([
            'logo' => $image,
            'nama_divisi' => $request->divisi,
        ]);

        return redirect()->route('divisi.index')->withSuccess('Data Divisi berhasil ditambahkan');
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
        $divisi = Divisi::find($id);
        return view('admin.divisi.divisi_edit', compact('divisi'));
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
        // dd($request);
        $divisi = Divisi::find($id);

        if ($request->file('logo')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('logo')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('error', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('logo');
            $image = $request->file('logo')->store('logo-divisi');
            $file->move('storage/logo-divisi/', $image);
            $image = str_replace('logo-divisi/', '', $image);
            if($divisi->logo){
                unlink(storage_path('app/logo-divisi/' . $divisi->logo));
                unlink(public_path('storage/logo-divisi/' . $divisi->logo));
            }
        } else {
            $image = $divisi->logo;
        }

        $divisi->update([
            'logo' => $image,
            'nama_divisi' => $request->divisi,
        ]);

        return redirect()->route('divisi.index')->withSuccess('Data Divisi berhasil diedit');
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
        $divisi = Divisi::find($id);
        if($divisi->logo){
            unlink(storage_path('app/logo-divisi/' . $divisi->logo));
            unlink(public_path('storage/logo-divisi/' . $divisi->logo));
          }
        $divisi->delete();

        return redirect()->route('divisi.index')->withSuccess('Data Divisi berhasil dihapus');
    }
}

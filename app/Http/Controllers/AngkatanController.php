<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $angkatan = Angkatan::all();
        return view('admin.angkatan.index',compact('angkatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.angkatan.angkatan_add');
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
        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('error', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('foto-angkatan');
            $file->move('storage/foto-angkatan/', $image);
            $image = str_replace('foto-angkatan/', '', $image);
        } else {
            $image = '';
        }

        Angkatan::create([
            'foto' => $image,
            'nama_angkatan' => $request->angkatan,
        ]);

        return redirect()->route('angkatan.index')->withSuccess('Data Angkatan berhasil ditambahkan');
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
        $angkatan = Angkatan::find($id);
        return view('admin.angkatan.angkatan_edit', compact('angkatan'));
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
        $angkatan = Angkatan::find($id);

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('error', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('foto-angkatan');
            $file->move('storage/foto-angkatan/', $image);
            $image = str_replace('foto-angkatan/', '', $image);
            if($angkatan->foto){
                unlink(storage_path('app/foto-angkatan/' . $angkatan->foto));
                unlink(public_path('storage/foto-angkatan/' . $angkatan->foto));
            }
        } else {
            $image = $angkatan->foto;
        }

        $angkatan->update([
            'foto' => $image,
            'nama_angkatan' => $request->angkatan,
        ]);

        return redirect()->route('angkatan.index')->withSuccess('Data Angkatan berhasil diedit');
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
        $angkatan = Angkatan::find($id);
        if($angkatan->foto){
            unlink(storage_path('app/foto-angkatan/' . $angkatan->foto));
            unlink(public_path('storage/foto-angkatan/' . $angkatan->foto));
          }
        $angkatan->delete();

        return redirect()->route('angkatan.index')->withSuccess('Data Angkatan berhasil dihapus');
    }
}

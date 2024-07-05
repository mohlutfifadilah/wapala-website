<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $segment = request()->segment(1);
        if ($segment===null){
            $segment = '/pendaftaran';
        }

        $admin = User::where('id', '=', 1)->first();
        if ($admin->oprec != 1){
            return redirect()->back();
        }
        return view('oprec', [ 'segment' => $segment ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $agama = Agama::all();
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $segment = request()->segment(1);
        if ($segment===null){
            $segment = '/formpendaftaran';
        }

        $admin = User::where('id', '=', 1)->first();
        if ($admin->oprec != 1){
            return redirect()->back();
        }
        return view('formoprec', [
            'segment' => $segment,
            'agama' => $agama,
            'fakultas' => $fakultas,
            'prodi' => $prodi
        ]);
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
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/create')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Admin', 'type' => 'error']);
        }
        if (is_null($request->nama_lengkap)) {
            return redirect()->route('pendaftaran.create')->with('nama_lengkap', 'Nama Lengkap harus diisi')->withInput();
        }
        if (is_null($request->jenis_kelamin)) {
            return redirect()->route('pendaftaran.create')->with('jenis_kelamin', 'Jenis Kelamin harus diisi')->withInput();
        }

        // if (is_null($request->golongan_darah)) {
        //     return redirect()->route('pendaftaran.create')->with('error', 'Golongan Darah harus diisi');
        // }

        // if (is_null($request->prodi)) {
        //     return redirect()->route('pendaftaran.create')->with('prodi', 'Program Studi harus diisi');
        // }

        // if (is_null($request->agama)) {
        //     return redirect()->route('pendaftaran.create')->with('error', 'Agama harus diisi');
        // }
        dd($request);

        // // Cek apakah embed HTML sudah ada di tabel desa
        // if (User::where('nia', $request->nia)->exists()) {
        //     return redirect()->back()->withInput()->with('error', 'NIA sudah digunakan!');
        // }

        // // Validasi apakah input email valid
        // if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        //     return redirect()->route('pendaftaran.create')->with('error', 'Format Email tidak valid');
        // }


        // if (is_null($request->tahun)) {
        //     return redirect()->route('pendaftaran.create')->with('error', 'Tahun harus diisi');
        // }

        // if (is_null($request->status)) {
        //     return redirect()->route('pendaftaran.create')->with('error', 'Status harus diisi');
        // }

        // if (strlen($request->nia) !== 19) {
        //     return redirect()->route('pendaftaran.create')->with('error', 'Format NIA tidak sesuai');
        // }

        // User::create([
        //     'nama' => $request->nama,
        //     'id_prodi' => $request->prodi,
        //     'tahun' => $request->tahun,
        //     'jenis_kelamin' => $request->jk,
        //     'nia' => $request->nia,
        //     'id_status' => $request->status,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // return redirect()->route('user.index')->withSuccess('Data Anggota berhasil ditambahkan');
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
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Fakultas;
use App\Models\Oprec;
use App\Models\Prodi;
use App\Models\User;
use Carbon\Carbon;
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

        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimes:jpeg,png,jpg|max:2048',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required',
            'prodi' => 'required',
            'agama' => 'required',
            'nohp' => 'required|numeric|min:10',
            'alamat_rumah' => 'required',
            'alamat_domisili' => 'required',
            'motivasi' => 'required',
            'pengalaman_organisasi' => 'required',
            'riwayat_penyakit' => 'required',
            'nama_orangtua' => 'required',
            'nohp_orangtua' => 'required|numeric|min:10',
        ],
        [
            'foto.required' => 'Foto harus diisi',
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Ukuran file maximal 2mb',
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'golongan_darah.required' => 'Golongan Darah harus diisi',
            'nim.required' => 'NIM harus diisi',
            'email.required' => 'Email harus diisi',
            'nim.numeric' => 'NIM harus berisi angka',
            'prodi.required' => 'Prodi harus diisi',
            'agama.required' => 'Agama harus diisi',
            'nohp.required' => 'No HP harus diisi',
            'nohp.numeric' => 'No HP harus berisi angka',
            'nohp.min' => 'Panjang No HP minimal 10 angka',
            'alamat_rumah.required' => 'Alamat Rumah harus diisi',
            'alamat_domisili.required' => 'Alamat Domisili harus diisi',
            'motivasi.required' => 'Motivasi harus diisi',
            'pengalaman_organisasi.required' => 'Pengalaman Organisasi harus diisi',
            'riwayat_penyakit.required' => 'Riwayat Penyakit harus diisi',
            'nama_orangtua.required' => 'Nama Orangtua harus diisi',
            'nohp_orangtua.required' => 'No HP Orangtua harus diisi',
            'nohp_orangtua.numeric' => 'No HP Orangtua harus berisi angka',
            'nohp_orangtua.min' => 'Panjang No HP Orangtua minimal 10 angka',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pendaftaran.create')->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Data Pendaftaran', 'type' => 'error']);
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if (Oprec::where('nim', $request->nim)->exists()) {
            return redirect()->back()->withInput()->with('nim', 'NIM sudah digunakan!');
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('email', 'Format Email tidak valid');
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('email', 'Email sudah digunakan');
        }

        if (Oprec::where('nohp', $request->nohp)->exists()) {
            return redirect()->back()->withInput()->with('nohp', 'No HP sudah digunakan!');
        }

        if (Oprec::where('nohp_orangtua', $request->nohp_orangtua)->exists()) {
            return redirect()->back()->withInput()->with('nohp_orangtua', 'No HP Orang Tua sudah digunakan!');
        }

        Carbon::setLocale('id');
        // Format tanggal_lahir menjadi "20 April 2001"
        $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $request->tanggal_lahir)->translatedFormat('j F Y');

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $foto = $request->file('foto')->store('oprec');
            $file->move('storage/oprec/', $foto);
            $foto = str_replace('oprec/', '', $foto);
            Oprec::create([
                'foto' => $foto,
                'nama' => $request->nama_lengkap,
                'jenis_kelamin' => strtoupper($request->jenis_kelamin),
                'tempatTglLahir' => $request->tempat_lahir . ', ' . $tanggal_lahir,
                'golongan_darah' => strtoupper($request->golongan_darah),
                'nim' => $request->nim,
                'email' => $request->email,
                'prodi' => $request->prodi,
                'agama' => $request->agama,
                'nohp' => $request->nohp,
                'alamat_rumah' => $request->alamat_rumah,
                'alamat_domisili' => $request->alamat_domisili,
                'motivasi' => $request->motivasi,
                'pengalaman_organisasi' => $request->pengalaman_organisasi,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'nama_orangtua' => $request->nama_orangtua,
                'nohp_orangtua' => $request->nohp_orangtua,
                'status' => 0
            ]);
        } else {
            Oprec::create([
                'nama' => $request->nama_lengkap,
                'jenis_kelamin' => strtoupper($request->jenis_kelamin),
                'tempatTglLahir' => $request->tempat_lahir . ', ' . $tanggal_lahir,
                'golongan_darah' => strtoupper($request->golongan_darah),
                'nim' => $request->nim,
                'email' => $request->email,
                'prodi' => $request->prodi,
                'agama' => $request->agama,
                'nohp' => $request->nohp,
                'alamat_rumah' => $request->alamat_rumah,
                'alamat_domisili' => $request->alamat_domisili,
                'motivasi' => $request->motivasi,
                'pengalaman_organisasi' => $request->pengalaman_organisasi,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'nama_orangtua' => $request->nama_orangtua,
                'nohp_orangtua' => $request->nohp_orangtua,
                'status' => 0
            ]);
        }

        return redirect('/')->with(['title' => 'Open Recruitment 2024 Wapala IT Telkom', 'success' => 'Pendaftaran Berhasil !','message' => 'Pendaftaran Berhasil!, <br> Informasi selanjutnya akan dikirim melalui email kampus, harap cek email kampus secara berkala <br><br> Salam Lestari!']);
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

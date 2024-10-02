<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::where('id','!=',1)->get();
        return view('admin.anggota.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prodi = Prodi::all();
        $status = Status::all();
        return view('admin.anggota.user_add', compact('prodi','status'));
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


        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('user.create')->with('error', 'Format Email tidak valid');
        }

        if (is_null($request->prodi)) {
            return redirect()->route('user.create')->with('error', 'Prodi harus diisi');
        }

        if (is_null($request->tahun)) {
            return redirect()->route('user.create')->with('error', 'Tahun harus diisi');
        }

        if (is_null($request->status)) {
            return redirect()->route('user.create')->with('error', 'Status harus diisi');
        }

        if($request->status != 1){
            // Cek apakah embed HTML sudah ada di tabel desa
            if (User::where('nia', $request->nia)->exists()) {
                return redirect()->back()->withInput()->with('error', 'NIA sudah digunakan!');
            }

            if (strlen($request->nia) !== 19) {
                return redirect()->route('user.create')->with('error', 'Format NIA tidak sesuai');
            }
        }


        User::create([
            'nama' => $request->nama,
            'id_prodi' => $request->prodi,
            'tahun' => $request->tahun,
            'jenis_kelamin' => $request->jk,
            'nia' => $request->nia,
            'id_status' => $request->status,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make('ahaha'),
        ]);

        return redirect()->route('user.index')->withSuccess('Data Anggota berhasil ditambahkan');
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
        $user = User::find($id);
        $prodi = Prodi::all();
        $status = Status::all();
        return view('admin.anggota.user_edit', compact('user','prodi', 'status'));
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
        $user = User::find($id);

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Format Email tidak valid');
        }

        $prodi = Prodi::find($user->id_prodi);
        if ($request->prodi){
          $id_prodi = $request->prodi;
        } else {
          $id_prodi = $prodi->id;
        }

        if (!$request->tahun){
          $id_tahun = $user->tahun;
        }

        $status = Status::find($user->id_status);
        if ($request->status){
          $id_status = $request->status;
        } else {
          $id_status = $status->id;
        }

        if($request->status != 1){
            if (strlen($request->nia) !== 19) {
                return redirect()->route('user.create')->with('error', 'Format NIA tidak sesuai');
            }
        }

        // Lakukan validasi hanya jika ada perubahan email atau no_wa
        if ($request->email !== $user->email) {
            $existingEmails = DB::table('users')
                ->where('email', '!=', $user->email)
                ->pluck('email');

            if (in_array($request->email, $existingEmails->toArray())) {
                // Tampilkan pesan error jika email sudah ada dalam database
                // Alert::error('Kesalahan', 'Email sudah ada');
                return redirect()->back()->with('error', 'Email sudah ada');
            }
        }

        $user->update([
            'nama' => $request->nama,
            'id_prodi' => $id_prodi,
            'tahun' => $id_tahun,
            'jenis_kelamin' => $request->jk,
            'nia' => $request->nia,
            'id_status' => $id_status,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make('ahaha'),
        ]);

        return redirect()->route('user.index')->withSuccess('Data Anggota berhasil diedit');

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
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->withSuccess('Data Anggota berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\OprecExport;
use App\Models\Oprec;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

class OprecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oprec = Oprec::orderBy('created_at', 'DESC')->get();
        return view('admin.oprec.index', compact('oprec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $oprec = Oprec::find($id);
        return view('admin.oprec.oprec_info', compact('oprec'));
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
        $oprec = Oprec::find($id);
        if($oprec->foto){
            unlink(storage_path('app/oprec/' . $oprec->foto));
            unlink(public_path('storage/oprec/' . $oprec->foto));
        }
        $oprec->delete();

        return redirect()->route('oprec.index')->withSuccess('Data Oprec berhasil dihapus');
    }

    public function open($oprec){

        $admin = User::find(Auth::user()->id);
        if ($oprec != 1){
            $admin->update([
                'oprec' => 1,
            ]);
        }else if ($oprec != 0){
            $admin->update([
                'oprec' => 0,
            ]);
        }

        return redirect()->route('oprec.index')->withSuccess('Status berhasil diubah');
    }

    public function reset(){

        Oprec::truncate();

        return redirect()->route('oprec.index')->withSuccess('Data berhasil direset');
    }

    public function sendEmail($id){

        $oprec = Oprec::find($id);

        $nama = $oprec->nama;
        $nim = $oprec->nim;
        $prodi = $oprec->prodi;
        $link = "https://chat.whatsapp.com/JZTSSFjyASL132ZP0JRppJ";

        $data["email"] = $oprec->email;
        $data["title"] = "Open Recruitment Wapala " . now()->year;

        Mail::send('mail.invite-group', [
            'nama'=> $nama,
            'nim'=> $nim,
            'prodi'=> $prodi,
            'link'=> $link
        ], function ($message) use ($data){
            $message->to($data["email"]);
            $message->subject($data["title"]);
        });;

        $oprec->update([
            'status' => 1,
        ]);

        return redirect()->route('oprec.index')->withSuccess('Terkirim');
    }

    public function export_excel(){
        return Excel::download(new OprecExport(),'oprec.xlsx');
    }

    public function export_pdf(){
        // Mengambil data pegawai dengan kolom 'nama_lengkap' dan 'jabatan'
        $oprec = Oprec::select('foto', 'nama', 'jenis_kelamin', 'tempatTglLahir', 'nim', 'prodi', 'agama', 'nohp', 'alamat_rumah', 'alamat_domisili', 'nama_orangtua', 'nohp_orangtua', 'motivasi', 'pengalaman_organisasi', 'golongan_darah', 'riwayat_penyakit')->get();

    	$pdf = FacadePdf::loadview('admin.oprec.export-pdf',['oprec'=>$oprec]);

        // Mengatur orientasi landscape (array dengan ukuran kertas dan orientasi)
        $pdf->setPaper('A4', 'landscape');

    	return $pdf->download('oprec.pdf');
    }
}

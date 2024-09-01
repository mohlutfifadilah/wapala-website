<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Oprec;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        if(!Auth::check())
            return redirect('/login')->with('error', 'Login terlebih dahulu!');

        $count_user = User::where('id','!=',1)->get()->count();
        $count_divisi = Divisi::all()->count();
        $count_oprec = Oprec::all()->count();

        $oprec = Oprec::limit(5)->get();

        // Mengambil data dan mengelompokkan berdasarkan tanggal pendaftaran
        $data_apex = DB::table('oprec')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Memetakan data ke format yang dibutuhkan oleh ApexCharts
        $dates = $data_apex->pluck('date');
        $totals = $data_apex->pluck('total');

        // Menggunakan query builder untuk mendapatkan data dari tabel User dan Prodi
        $data_pie = DB::table('users')
                    ->join('prodi', 'users.id_prodi', '=', 'prodi.id')
                    ->select('nama_prodi as prodi_name', DB::raw('count(users.id) as count'))
                    ->groupBy('nama_prodi')
                    ->get();

        // Mapping data agar sesuai dengan format yang dibutuhkan oleh chart
        $chartData_pie = $data_pie->map(function($item) {
            return [
                'value' => $item->count,
                'name' => $item->prodi_name
            ];
        });

        return view('admin.dashboard', compact('count_user', 'count_divisi', 'count_oprec', 'oprec', 'dates', 'totals', 'chartData_pie'));
    }
}

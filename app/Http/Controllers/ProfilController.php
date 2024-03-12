<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
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
            $segment = '/beranda';
        }

        $total = User::whereNotNull('id_status')->count();
        $ak = User::where('id_status', 1)->count();
        $alb = User::where('id_status', 2)->count();
        $ab = User::where('id_status', 3)->count();

        $angkatan = Angkatan::all();

        return view('profil', [ 'segment' => $segment,
                                'total' => $total,
                                'ak' => $ak,
                                'alb' => $alb,
                                'ab' => $ab,
                                'angkatan' => $angkatan,
                                 ] );
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

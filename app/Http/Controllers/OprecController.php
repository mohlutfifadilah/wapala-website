<?php

namespace App\Http\Controllers;

use App\Models\Oprec;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $oprec = Oprec::all();
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
    }

    public function open($oprec){

        $admin = User::find(Auth::user()->id);
        if ($oprec === '0'){
            $admin->update([
                'oprec' => 1,
            ]);
        }else if ($oprec === '1'){
            $admin->update([
                'oprec' => 0,
            ]);
        }

        return redirect()->route('oprec.index')->withSuccess('Status berhasil diubah');
    }

    public function sendEmail($id){

        $passingDataToView = 'Simple Mail Send In Laravel!';
        $data["email"] = 'test@mail.com';
        $data["title"] = "Mail Testing";

        Mail::send('mail.sendgroup', ['passingDataToView'=> $passingDataToView], function ($message) use ($data){
            $message->to($data["email"],'John Doe');
            $message->subject($data["title"]);
        });;


        return redirect()->route('oprec.index')->withSuccess('Terkirim');
    }
}

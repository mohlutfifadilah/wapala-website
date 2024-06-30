<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    //
    public function index()
    {
        //
        $galeri = Galeri::all();
        $segment = request()->segment(1);
        if ($segment===null){
            $segment = '/album';
        }
        $kategori = Kategori::all();
        return view('galeri',compact('galeri', 'segment', 'kategori'));
    }
}

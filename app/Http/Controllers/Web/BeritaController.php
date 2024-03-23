<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('web.berita.index', compact('berita'));
    }

    public function show($id)
    {

        $berita = Berita::find($id);
        return view('web.berita.show', compact('berita'));
    }
}

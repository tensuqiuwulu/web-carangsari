<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::paginate(5);
        $recentBerita = Berita::orderBy('created_at', 'desc')->limit(5)->get();
        return view('web.berita.index', compact('berita', 'recentBerita'));
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        $recentBerita = Berita::orderBy('created_at', 'desc')->limit(5)->get();
        return view('web.berita.show', compact('berita', 'recentBerita'));
    }
}

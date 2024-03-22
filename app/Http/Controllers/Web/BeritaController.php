<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        return view('web.berita.index');
    }

    public function show($id)
    {
        return view('web.berita.show', compact('id'));
    }
}

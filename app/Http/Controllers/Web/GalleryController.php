<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        // get gallery
        $gallery = Gallery::all();
        return view('web.gallery.index', compact('gallery'));
    }
}

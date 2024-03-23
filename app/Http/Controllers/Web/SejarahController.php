<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;

class SejarahController extends Controller
{
    public function index()
    {
        // get sejarah
        $sejarah = Sejarah::first();
        return view('web.sejarah.index', compact('sejarah'));
    }
}

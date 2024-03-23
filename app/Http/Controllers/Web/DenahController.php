<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denah;

class DenahController extends Controller
{
    public function index()
    {
        // get denah
        $denah = Denah::first();
        return view('web.denah.index', compact('denah'));
    }
}

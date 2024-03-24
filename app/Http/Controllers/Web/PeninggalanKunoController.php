<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeninggalanKuno;

class PeninggalanKunoController extends Controller
{
    public function index()
    {
        $peninggalanKuno = PeninggalanKuno::all();
        return view('web.peninggalan_kuno.index', compact('peninggalanKuno'));
    }

    public function show($id)
    {
        $peninggalanKuno = PeninggalanKuno::find($id);
        return view('web.peninggalan_kuno.show', compact('peninggalanKuno'));
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeninggalanKunoController extends Controller
{
    public function index()
    {
        return view('web.peninggalan_kuno.index');
    }
}

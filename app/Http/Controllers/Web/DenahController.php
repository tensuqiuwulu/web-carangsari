<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DenahController extends Controller
{
    public function index()
    {
        return view('web.denah.index');
    }
}

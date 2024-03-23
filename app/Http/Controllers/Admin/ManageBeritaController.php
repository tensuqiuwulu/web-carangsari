<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Berita;

class ManageBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $berita = Berita::all();
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // request validate
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // upload image to storage
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->extension();
            $foto->storeAs('public/berita', $fotoName);

            // update or create
            $berita = Berita::firstOrNew(['id' => 1]);
            $berita->judul = $request->judul;
            $berita->deskripsi = $request->deskripsi;
            $berita->foto = $fotoName;
            $berita->save();

            return response()->json([
                'message' => 'Berita berhasil disimpan'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/berita/' . $fotoName);
            }

            return response()->json([
                'message' => 'Berita gagal disimpan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

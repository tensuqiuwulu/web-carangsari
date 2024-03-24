<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

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

            // create berita
            $berita = new Berita();
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
        // Find data
        $berita = Berita::find($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // request validate
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // find berita
            $berita = Berita::find($id);

            // upload image to storage
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->extension();
                $foto->storeAs('public/berita', $fotoName);

                // remove old foto
                Storage::delete('public/berita/' . $berita->foto);
                $berita->foto = $fotoName;
            }

            // update berita
            $berita->judul = $request->judul;
            $berita->deskripsi = $request->deskripsi;
            $berita->save();

            return response()->json([
                'message' => 'Berita berhasil diupdate'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/berita/' . $fotoName);
            }

            return response()->json([
                'message' => 'Berita gagal diupdate',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Destroy data
        $berita = Berita::find($id);
        $berita->delete();
        return redirect()->route('admin.berita.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class ManageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get gallery
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // request validate
        $request->validate([
            'judul' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // upload image to storage
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->extension();
            $foto->storeAs('public/gallery', $fotoName);

            // create berita
            $gallery = new Gallery();
            $gallery->judul = $request->judul;
            $gallery->foto = $fotoName;
            $gallery->save();

            return response()->json([
                'message' => 'Peninggalan Kuno berhasil disimpan'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/gallery/' . $fotoName);
            }

            return response()->json([
                'message' => 'Peninggalan Kuno gagal disimpan',
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
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // request validate
        $request->validate([
            'judul' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Find data
            $gallery = Gallery::find($id);

            // upload image to storage
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->extension();
                $foto->storeAs('public/gallery', $fotoName);
                $gallery->foto = $fotoName;
            }

            // update data
            $gallery->judul = $request->judul;
            $gallery->save();

            return response()->json([
                'message' => 'Gallery berhasil diupdate'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/gallery/' . $fotoName);
            }

            return response()->json([
                'message' => 'Gallery gagal diupdate',
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
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->route('admin.gallery.index');
    }
}

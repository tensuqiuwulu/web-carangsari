<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeninggalanKuno;

class ManagePeninggalanKunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get peninggalan kuno
        $peninggalanKuno = PeninggalanKuno::all();
        return view('admin.peninggalan_kuno.index', compact('peninggalanKuno'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.peninggalan_kuno.create');
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
            $foto->storeAs('public/peninggalan_kuno', $fotoName);

            // create berita
            $PeninggalanKuno = new PeninggalanKuno();
            $PeninggalanKuno->judul = $request->judul;
            $PeninggalanKuno->deskripsi = $request->deskripsi;
            $PeninggalanKuno->foto = $fotoName;
            $PeninggalanKuno->save();

            return response()->json([
                'message' => 'Peninggalan Kuno berhasil disimpan'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/peninggalan_kuno/' . $fotoName);
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
        // get peninggalan kuno
        $peninggalanKuno = PeninggalanKuno::find($id);
        return view('admin.peninggalan_kuno.edit', compact('peninggalanKuno'));
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // upload image to storage
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->extension();
            $foto->storeAs('public/peninggalan_kuno', $fotoName);

            // update peninggalan kuno
            $PeninggalanKuno = PeninggalanKuno::find($id);
            $PeninggalanKuno->judul = $request->judul;
            $PeninggalanKuno->deskripsi = $request->deskripsi;
            $PeninggalanKuno->foto = $fotoName;
            $PeninggalanKuno->save();

            return response()->json([
                'message' => 'Peninggalan Kuno berhasil diupdate'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/peninggalan_kuno/' . $fotoName);
            }

            return response()->json([
                'message' => 'Peninggalan Kuno gagal diupdate',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete peninggalan kuno
        $PeninggalanKuno = PeninggalanKuno::find($id);
        $PeninggalanKuno->delete();
        return redirect()->route('admin.peninggalan_kuno.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denah;

class ManageDenahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get denah
        $denah = Denah::first();
        return view('admin.denah.index', compact('denah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // request validate
        $request->validate([
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $denah = Denah::firstOrNew(['id' => 1]);
            // upload image to storage
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->extension();
                $foto->storeAs('public/denah', $fotoName);

                $denah->foto = $fotoName;
            }

            // update or create

            $denah->judul = 'Sejarah';
            $denah->deskripsi = $request->deskripsi;
            $denah->save();

            return response()->json([
                'message' => 'Denah berhasil disimpan'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/denah/' . $fotoName);
            }

            return response()->json([
                'message' => 'Denah gagal disimpan',
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

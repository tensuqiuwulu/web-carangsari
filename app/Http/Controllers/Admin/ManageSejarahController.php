<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;

class ManageSejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get sejarah
        $sejarah = Sejarah::first();
        return view('admin.sejarah.index', compact('sejarah'));
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
            $sejarah = Sejarah::firstOrNew(['id' => 1]);
            // upload image to storage
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->extension();
                $foto->storeAs('public/sejarah', $fotoName);

                $sejarah->foto = $fotoName;
            }

            // update or create
            $sejarah->judul = 'Sejarah';
            $sejarah->deskripsi = $request->deskripsi;
            $sejarah->save();

            return response()->json([
                'message' => 'Sejarah berhasil disimpan'
            ], 200);
        } catch (\Exception $e) {
            // remove foto
            if (isset($fotoName)) {
                Storage::delete('public/sejarah/' . $fotoName);
            }

            return response()->json([
                'message' => 'Sejarah gagal disimpan',
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

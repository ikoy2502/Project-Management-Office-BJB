<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projek;

class ProjekController extends Controller
{
    public function index()
    {
        $projek = Projek::all();
        return view('projek.index', compact('projek'));
    }

    public function create()
    {
        return view('projek.create');
    }

    public function store(Request $request)
    {
        Projek::create([
            'kode_projek' => $request->kode_projek,
            'nama_projek' => $request->nama_projek,
            'asal_project_id' => $request->asal_project_id,
            'deskripsi' => $request->deskripsi,
            'type' => $request->type,
        ]);

        return redirect()->route('projek.index')->with('success', 'Projek berhasil disimpan');
    }

    public function edit($id)
    {
        $projek = Projek::find($id);
        return view('projek.edit', compact('projek'));
    }

    public function update(Request $request, $id)
    {
        $projek = Projek::find($id);
        $projek->update([
            'kode_projek' => $request->kode_projek,
            'nama_projek' => $request->nama_projek,
            'asal_project_id' => $request->asal_project_id,
            'deskripsi' => $request->deskripsi,
            'type' => $request->type,
        ]);

        return redirect()->route('projek.index')->with('success', 'Projek berhasil diperbarui');
    }

    public function destroy($id)
    {
        $projek = Projek::find($id);
        $projek->delete();

        return redirect()->route('projek.index')->with('success', 'Projek berhasil dihapus');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revisions;
use Illuminate\Support\Facades\DB;


class RevisionsController extends Controller
{
    public function index()
    {
        $revisions = Revisions::all();
        return view('configure-revisions.index', compact('revisions'));
    }

    public function create()
    {
        return view('configure-revisions.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255',
            // Tambahkan validasi untuk kolom lain jika diperlukan
        ]);

        // Simpan data ke dalam database
        Revisions::create([
            'name' => $request->input('name'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('configure-revisions.index')->with('success', 'Revisions berhasil ditambahkan.');
    }

    // public function show($id)
    // {
    //     $revision = Revisions::find($id);
    //     return view('revisions.show', compact('revision'));
    // }

    public function edit($id)
    {
        $revision = Revisions::find($id);
        return view('configure-revisions.edit', compact('revision'));
    }
    

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255',
            // Tambahkan validasi untuk kolom lain jika diperlukan
        ]);

        // Perbarui data dalam database
        Revisions::where('id', $id)->update([
            'name' => $request->input('name'),
            // Perbarui kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('configure-revisions.index')->with('success', 'Revisions berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari catatan yang terkait di tabel projects dan hapus mereka
// Cari catatan yang terkait di tabel projects dan hapus mereka
DB::table('projects')->where('revision_id', $id)->delete();

    
        // Hapus catatan dari tabel revisions
        Revisions::destroy($id);
    
        return redirect()->route('configure-revisions.index')->with('success', 'Revisions berhasil dihapus.');
    }
    
}


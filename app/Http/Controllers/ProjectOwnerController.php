<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectOwner;

class ProjectOwnerController extends Controller
{
    public function index()
    {
        $projectOwners = ProjectOwner::all();
        return view('configuration.project-owners.index', compact('projectOwners'));
    }
    

    public function create()
    {
        return view('project-owners.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'divisi' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'subgroup' => 'required|string|max:255',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        ProjectOwner::create($validatedData);

        return redirect()->route('project-owners.configuration')->with('success', 'Project Owner berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $projectOwner = ProjectOwner::findOrFail($id);
        return view('project-owners.edit', compact('projectOwner')); // Ganti 'configuration.project_owners.edit' menjadi 'project-owners.edit'
    }
    

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'divisi' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'subgroup' => 'required|string|max:255',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $projectOwner = ProjectOwner::findOrFail($id);
        $projectOwner->update($validatedData);

        return redirect()->route('project-owners.configuration')->with('success', 'Project Owner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $projectOwner = ProjectOwner::findOrFail($id);
        $projectOwner->delete();

        return redirect()->route('project-owners.configuration')->with('success', 'Project Owner berhasil dihapus.');
    }
            public function configuration()
        {
            // Logika untuk konfigurasi Project Owner
            // ...
            $projectOwners = ProjectOwner::all();
            return view('project-owners.configuration', compact('projectOwners'));
        }

}

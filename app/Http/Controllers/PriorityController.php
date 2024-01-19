<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Priority;
use App\Models\Project;

class PriorityController extends Controller
{
    public function index()
{
    $priorities = Priority::all(); // Sesuaikan dengan model dan tabel priority Anda
    return view('configure-priority.index', compact('priorities'));
}
    public function edit()
    {
       
        $priorities = Priority::all();
        return view('configure-priority.edit', compact('priorities'));
    }

    public function update(Request $request)
    {
        // Validasi input jika diperlukan

        // Perbarui data prioritas dalam database sesuai dengan input dari formulir

        return redirect()->route('priority.edit')->with('success', 'Prioritas berhasil diperbarui.');
    }
    
    public function editPriority()
    {
        $projects = Project::all();
        $priorities = Priority::all();  
        return view('configure-priority.edit', compact('projects', 'priorities'));
    }
        public function create()
    {
        return view('configure-priority.create');
    }
    public function store(Request $request)
{
    // Lakukan validasi data yang dikirimkan dari formulir jika diperlukan
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Simpan data prioritas ke dalam database
    $priority = new Priority;
    $priority->name = $request->input('name');
    $priority->save();

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect()->route('configure-priority.index')->with('success', 'Priority berhasil ditambahkan.');
}


    
}

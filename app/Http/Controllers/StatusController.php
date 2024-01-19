<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.view', compact('statuses'));
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Status::create($validatedData);

        return redirect()->route('statuses.index')->with('success', 'Status berhasil ditambahkan.');
    }

    public function edit(Status $status)
    {
        return view('statuses.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $status->update($validatedData);

        return redirect()->route('statuses.index')->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index')->with('success', 'Status berhasil dihapus.');
    }
}



<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use PDF; // Import PDF facade

class ProjectController extends Controller
{
    public function show($projectId)
    {
        $project = Project::find($projectId);
        $owner = $project->owner;
        return view('project', compact('project')); 

        // Lakukan apa yang Anda inginkan dengan $project dan $owner
        // Contoh: kirimkan data ke view atau lakukan operasi lainnya
    }


    public function exportPDF()
    {
        $projects = Project::all(); // Ambil semua data proyek

        $pdf = PDF::loadView('projects.exportpdf', compact('projects'));

        return $pdf->download('projects.pdf');
    }

}

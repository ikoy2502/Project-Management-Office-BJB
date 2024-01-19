<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ReportController extends Controller
{
    // Method untuk menampilkan tampilan report
    public function index(Request $request)
    {
           
        $selectedTriwulan = $request->input('triwulan', 'all');

        $projects = Project::all();

        

        return view('reports.index', compact('projects' , 'selectedTriwulan')); // Gantilah 'reports.index' dengan nama view yang sesuai
    }
}

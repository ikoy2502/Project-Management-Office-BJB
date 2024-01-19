<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProjectsExport;
use App\Models\Project;

class ExcelExportController extends Controller
{
    public function exportExcel(Request $request)
    {
        // Ambil data triwulan yang dipilih dari permintaan
        $selectedQuarter = $request->input('triwulan');

        // Inisialisasi kueri yang akan digunakan untuk mengekstrak data proyek
        $projectsQuery = Project::query();

        if ($selectedQuarter !== 'all') {
            $projectsQuery->where('triwulan', $selectedQuarter);
        }

        // Eksekusi kueri dan ambil data proyek
        $projects = $projectsQuery->get();

        // Ekspor data menggunakan ekspor "ProjectsExport" dan beri nama file "projects.xlsx"
        return Excel::download(new ProjectsExport($projects, $selectedQuarter), 'projects.xlsx');
    }
}

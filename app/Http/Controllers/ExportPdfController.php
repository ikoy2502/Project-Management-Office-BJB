<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Project;

class ExportPdfController extends Controller
{
    public function exportPdf(Request $request)
    {
        // Ambil data proyek yang ingin Anda sertakan dalam PDF
        $projects = Project::all();

        // Render tampilan PDF menggunakan data proyek
        $pdf = PDF::loadView('projects.pdf.export', compact('projects'));

        // Mengatur nama file PDF yang akan diunduh
        $fileName = 'projects_report.pdf';

        // Mengirimkan file PDF sebagai respons ke browser
        return $pdf->download($fileName);
    }
}
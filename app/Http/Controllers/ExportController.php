<?php

namespace App\Http\Controllers;

use App\Exports\ProjectExport; // Sesuaikan dengan nama dan namespace export class Anda
use Maatwebsite\Excel\Facades\Excel;

// ...

public function exportExcel()
{
    $this->middleware('auth');
    return Excel::download(new ProjectExport, 'projects.xlsx');
}

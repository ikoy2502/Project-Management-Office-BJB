<?php
namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectsExport implements FromCollection, WithHeadings
{
    protected $projects;
    protected $selectedQuarter;

    public function __construct($projects, $selectedQuarter)
    {
        $this->projects = $projects;
        $this->selectedQuarter = $selectedQuarter;
    }

    public function headings(): array
    {
        return [
            'Kode Proyek',
            'Nama Proyek',
            'Deskripsi',
            'Status',
            'Pemilik Proyek',
            'Lead Subgroup',
            'Secondary Subgroup',
            'Kategori',
            'Prioritas',
            'PIC',
            'Secondary PIC',
            'Tanggal Target',
            'Triwulan',
            'Revisi',
            'Tanggal Mulai',
        ];
    }

    public function collection()
    {
        $data = [];

        foreach ($this->projects as $project) {
            // Cek apakah triwulan dari proyek sesuai dengan triwulan yang dipilih
            if ($project->triwulan == $this->selectedQuarter) {
                $data[] = [
                    $project->project_code,
                    $project->project_name,
                    $project->description,
                    optional($project->status)->nama,
                    optional($project->projectOwner)->divisi . ' - ' . optional($project->projectOwner)->group . ' - ' . optional($project->projectOwner)->subgroup,
                    optional($project->leadSubgroup)->subgroup,
                    optional($project->secondarySubgroup)->subgroup,
                    optional($project->category)->name,
                    optional($project->priority)->name,
                    optional($project->pic)->name,
                    optional($project->secondaryPic)->name,
                    $project->target_date,
                    $project->triwulan,
                    optional($project->revision)->name,
                    $project->started_at,
                ];
            }
        }

        return collect($data);
    }
}

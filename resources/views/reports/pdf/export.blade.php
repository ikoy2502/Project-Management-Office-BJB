<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects Report</title>
    <!-- Tambahkan pustaka CSS dan JavaScript yang diperlukan di sini -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        // Inisialisasi DataTable pada tabel
        $(document).ready(function() {
            $('#projectsTable').DataTable({
                // Konfigurasi pilihan pengurutan berdasarkan kolom
                "order": [[2, 'asc'], [3, 'asc']] // Misalnya, mengurutkan berdasarkan Status lalu Triwulan
            });
        });
    </script>
    <style>
        /* Gaya CSS khusus untuk tampilan PDF */
    </style>
</head>
<body>
    <h1>Projects Report</h1>
    <table id="projectsTable">
        <thead>
            <tr>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Kode Proyek</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Nama Proyek</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Deskripsi</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Status</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Pemilik Proyek</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Lead Subgroup</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Secondary Subgroup</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Kategori</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Prioritas</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">PIC</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Secondary PIC</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Tanggal Target</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Triwulan</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Revisi</th>
                <th style="font-size: 14px; max-width: 150px; word-wrap: break-word;">Tanggal Mulai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                                    <tr>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $project->project_code }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $project->project_name }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $project->description }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->status)->nama }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">
                                          {{ optional($project->projectOwner)->divisi }} -
                                          {{ optional($project->projectOwner)->group }} -
                                          {{ optional($project->projectOwner)->subgroup }}
                                      </td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->leadSubgroup)->subgroup }}
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->secondarySubgroup)->subgroup }}
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->category)->name }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->priority)->name }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->pic)->name }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->secondaryPic)->name }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $project->target_date }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $project->triwulan }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ optional($project->revision)->name }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $project->started_at }}</td>
                                    </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

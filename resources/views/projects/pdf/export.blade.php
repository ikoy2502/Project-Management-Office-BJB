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
                <th>Project Code</th>
                <th>Project Name</th>
                <th>Status</th>
                <th>Triwulan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->project_code }}</td>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->status->nama }}</td>
                    <td>{{ $project->triwulan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

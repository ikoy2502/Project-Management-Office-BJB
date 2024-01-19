<!DOCTYPE html>
<html>
<head>
    <title>Detail Proyek</title>
</head>
<body>
    <h1>Detail Proyek</h1>
    <p><strong>Kode Proyek:</strong> {{ $project->project_code }}</p>
    <p><strong>Nama Proyek:</strong> {{ $project->project_name }}</p>
    <p><strong>Deskripsi:</strong> {{ $project->description }}</p>
    <p><strong>Kategori:</strong> {{ $project->category }}</p>

    <h2>Pemilik Proyek</h2>
    <p><strong>Divisi:</strong> {{ $project->owner->divisi }}</p>
    <p><strong>Group:</strong> {{ $project->owner->group }}</p>
    <p><strong>Subgroup:</strong> {{ $project->owner->subgroup }}</p>
</body>
</html>

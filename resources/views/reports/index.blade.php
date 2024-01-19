@php
    $activePage = 'report';
    $namePage = 'Report Data';
    $selectedTriwulan = request('triwulan', 'all');
@endphp

@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <h1>Report Page</h1>
                        <form action="{{ route('reports.export-excel') }}" method="GET">
                            <div class="form-group">
                                <label for="quarter">Pilih Report Berdasrkan Triwulan:</label>
                                <select id="triwulan" name="triwulan" class="form-control" onchange="this.form.submit()">
                                    <option value="Q1" @if ($selectedTriwulan === 'Q1') selected @endif>Q1</option>
                                    <option value="Q2" @if ($selectedTriwulan === 'Q2') selected @endif>Q2</option>
                                    <option value="Q3" @if ($selectedTriwulan === 'Q3') selected @endif>Q3</option>
                                    <option value="Q4" @if ($selectedTriwulan === 'Q4') selected @endif>Q4</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
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
                                                <td style="max-width: 150px; word-wrap: break-word">{{ optional($project->leadSubgroup)->subgroup }}</td>
                                                <td style="max-width: 150px; word-wrap: break-word">{{ optional($project->secondarySubgroup)->subgroup }}</td>
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

                        </div>

                        <!-- Tambahkan konten report Anda di sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exportExcelButton = document.getElementById('export-excel-button');
        var exportExcelButtonAll = document.getElementById('export-excel-button-all');
        var triwulanSelect = document.getElementById('triwulan');

        exportExcelButton.addEventListener('click', function() {
            var selectedTriwulan = triwulanSelect.value;
            if (selectedTriwulan === 'all') {
                selectedTriwulan = 'all';
            }
            var exportUrl = '{{ route("reports.export-excel") }}?triwulan=' + selectedTriwulan;
            window.location.href = exportUrl;
        });

        // Handle the "Export All" button click event
        exportExcelButtonAll.addEventListener('click', function() {
            var selectedTriwulan = 'all'; // Set the value to "all" for "Export All"
            var exportUrl = '{{ route("reports.export-excel") }}?triwulan=' + selectedTriwulan;
            window.location.href = exportUrl;
        });
    });
</script>


@endsection

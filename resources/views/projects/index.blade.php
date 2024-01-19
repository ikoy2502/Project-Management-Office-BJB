
@php
    $activePage = 'index';
    $namePage = 'index';
    $statuses = App\Models\Status::all(); // Ambil semua status
    $selectedStatus = request('status'); // Ambil status yang dipilih dari URL
    $selectedTriwulan = request('triwulan', 'all'); // Ambil triwulan yang dipilih dari URL, default ke 'all' jika tidak ada

    // Query Projects dengan filter status jika dipilih
    $projectsQuery = App\Models\Project::query();

    if ($selectedStatus) {
        // Filter berdasarkan status jika dipilih
        $projectsQuery->where('status_id', $selectedStatus);
    }

    // Filter berdasarkan triwulan, hanya jika bukan "All Triwulan"
    if ($selectedTriwulan !== 'all') {
        $projectsQuery->where('triwulan', $selectedTriwulan);
    }

    $projects = $projectsQuery->get();
@endphp
@php
    $search = request('search');

    // Query Projects dengan filter status jika dipilih
    $projectsQuery = App\Models\Project::query();

    if ($selectedStatus) {
        // Filter berdasarkan status jika dipilih
        $projectsQuery->where('status_id', $selectedStatus);
    }

    // Filter berdasarkan triwulan, hanya jika bukan "All Triwulan"
    if ($selectedTriwulan !== 'all') {
        $projectsQuery->where('triwulan', $selectedTriwulan);
    }

    // Tambahkan kondisi pencarian ke dalam query
    if ($search) {
        $projectsQuery->where(function ($query) use ($search) {
            $query->where('project_code', 'LIKE', '%' . $search . '%')
                  ->orWhere('project_name', 'LIKE', '%' . $search . '%');
        });
    }

    $projects = $projectsQuery->get();
@endphp


@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Projects</h2>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#filterModal">Filter</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (in_array(Auth::user()->role, ['GH', 'MGR', 'QA']))
                    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>
                    @endif
                    @if ($projects->isEmpty())
                        <p>No results found.</p>
                    @else
                    
                    
                    <form action="{{ route('projects.index') }}" method="GET" class="form-inline">
                        <div class="form-group">
                            <label for="search" class="sr-only">Search:</label>
                            <input type="text" name="search" id="search" class="form-control mb-2 mr-sm-2" placeholder="Search..." value="{{ $search }}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 mr-sm-2">Search</button>
                        @if ($search)
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-2">Clear Search</a>
                        @endif
                    </form>

                        
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project Code</th>
                                    <th>Project Name</th>
                                    <th>Status</th>
                                    <th>Triwulan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>{{ $project->project_code }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>
                                            @if ($project->status)
                                                {{ $project->status->nama }} {{-- Assuming 'nama' is the column in 'statuses' containing the status name --}}
                                            @else
                                                Status not available
                                            @endif
                                        </td>
                                        <td>{{ $project->triwulan }}</td> {{-- Assuming 'triwulan' is the column in 'projects' containing the quarter information --}}
                                        <td>
                                            
                                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-info">View</a>
                                            @if (in_array(Auth::user()->role, ['GH', 'MGR']))
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No results found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Projects</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projects.index') }}" method="GET">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="triwulan">Triwulan</label>
                                <select id="triwulan" name="triwulan" class="form-control">
                                    <option value="all" @if ($selectedTriwulan === 'all' || !$selectedTriwulan) selected @endif>All Triwulan</option>
                                    <option value="Q1" @if ($selectedTriwulan === 'Q1') selected @endif>Q1</option>
                                    <option value="Q2" @if ($selectedTriwulan === 'Q2') selected @endif>Q2</option>
                                    <option value="Q3" @if ($selectedTriwulan === 'Q3') selected @endif>Q3</option>
                                    <option value="Q4" @if ($selectedTriwulan === 'Q4') selected @endif>Q4</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="">All Status</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" @if ($status->id == $selectedStatus) selected @endif>{{ $status->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

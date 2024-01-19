@php
    $activePage = 'edit';
    $namePage = 'edit';
    $statuses = App\Models\Status::all();
@endphp

@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
    <div class="container">
        <h2>Edit Project</h2>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_code">Project Code:</label>
                <input type="text" name="project_code" class="form-control" value="{{ $project->project_code }}">
            </div>
            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" class="form-control" value="{{ $project->project_name }}">
            </div>
            <div class="form-group">
                <label for="project_owner_id">Project Owner:</label>
                <select name="project_owner_id" class="form-control">
                    @foreach ($projectOwners as $owner)
                        <option value="{{ $owner->id }}" {{ $owner->id === $project->project_owner_id ? 'selected' : '' }}>
                            {{ $owner->id . ' - ' . $owner->divisi . ' - ' . $owner->group . ' - ' . $owner->subgroup }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="lead_subgroup_id">Lead Subgroup:</label>
                <select name="lead_subgroup_id" class="form-control">
                    @foreach ($projectOwners as $owner)
                        <option value="{{ $owner->id }}" {{ $owner->id === $project->lead_subgroup_id ? 'selected' : '' }}>
                            {{ $owner->subgroup }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="secondary_subgroup_id">Secondary subgroup</label>
                <select name="secondary_subgroup_id" class="form-control">
                    @foreach ($projectOwners as $owner)
                        <option value="{{ $owner->id }}" {{ $owner->id === $project->secondary_subgroup_id ? 'selected' : '' }}>
                            {{ $owner->id . ' - ' . $owner->divisi . ' - ' . $owner->group . ' - ' . $owner->subgroup }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Add more form fields for other project attributes -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control">{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="target_date">Target Date:</label>
                <input type="date" name="target_date" class="form-control" value="{{ $project->target_date }}">
            </div>
            <div class="form-group">
                <label for="target_revisions">Target Revisions:</label>
                <select name="target_revisions" class="form-control">
                    @for ($i = 0; $i <= 4; $i++)
                        <option value="{{ $i }}" {{ $i === $project->target_revisions ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="status_id">Status:</label>
                <select name="status_id" class="form-control">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

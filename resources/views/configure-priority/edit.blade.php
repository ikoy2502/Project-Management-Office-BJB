{{-- @php
    $activePage = 'priority';
    $namePage = 'configure';
    $projects = isset($projects) ? $projects : [];
    $priorities = isset($priorities) ? $priorities : [];
@endphp --}}

@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">

    <h3>Edit Project Priority</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('priority.editPriority') }}" method="GET">
        @csrf

        <div class="form-group">
            <label for="project_id">Select Project:</label>
            <select name="project_id" id="project_id" class="form-control">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="priority_id">Select Priority:</label>
            <select name="priority_id" id="priority_id" class="form-control">
                @foreach($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Edit Priority</button>
    </form>
</div>
@endsection

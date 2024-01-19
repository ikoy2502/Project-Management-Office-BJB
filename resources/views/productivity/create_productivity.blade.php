@php
    $activePage = 'createprod';
    $namePage = 'create productivity';
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
        
            <h5 class="modal-title" id="newProductivityModalLabel">New Productivity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        <div class="modal-body">
            <form action="{{ route('productivity.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="project_id">Project</label>
                    <select name="project_id" id="project_id" class="form-control" required>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="task_id">Task</label>
                    <select name="task_id" id="task_id" class="form-control" required>
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->task_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="start">Start Time</label>
                    <input type="time" name="start" id="start" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="time" name="end_time" id="end_time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time_rendered">Time Rendered</label>
                    <input type="time" name="time_rendered" id="time_rendered" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        // Aktifkan modal saat tombol diklik
        $('#new_productivity_button').click(function () {
            $('#newProductivityModal').modal('show');
        });
    });
</script>




@php
    $activePage = 'view';
    $namePage = 'view';
    $projectId = // Set the project ID here;
    $projects = App\Models\Project::all();
    $tasks = App\Models\Task::all();
    $productivity = App\Models\Productivity::all();
@endphp

@extends('layouts.app')

@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-lg-12 mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="callout callout-info">
                                <div class="col-md-12">
                                    <!-- Your existing content here -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Project Name</b></dt>
                                                <dd>{{ ucwords($project->project_name) }}</dd>
                                                <dt class="border-bottom border-primary"><b>Description</b></dt>
                                                <dd>{{ html_entity_decode($project->description) }}</dd>
                                                <dt class="border-bottom border-primary"><b>Remaining Days</b></dt>
                                                <dd>
                                                    @if ($project->target_date)
                                                        <?php
                                                        $currentDate = \Carbon\Carbon::now();
                                                        $targetDate = \Carbon\Carbon::parse($project->target_date);
                                                        $remainingDays = $currentDate->diffInDays($targetDate);
                                                        ?>
                                                        {{ $remainingDays }} days
                                                    @else
                                                        N/A <!-- Or any other message for projects without a target date -->
                                                    @endif
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Project In Charge (PIC)</b></dt>
                                                <dd>
                                                    @if ($project->pic)
                                                        <div class="d-flex align-items-center mt-1">
                                                            {{-- Display PIC's information --}}
                                                            <b>{{ ucwords($project->pic->name) }}</b>
                                                        </div>
                                                    @else
                                                        <small><i>PIC not specified</i></small>
                                                    @endif
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Secondary Project In Charge (Secondary PIC)</b></dt>
                                                <dd>
                                                    @if ($project->secondaryPic)
                                                        <div class="d-flex align-items-center mt-1">
                                                            {{-- Display Secondary PIC's information --}}
                                                            <b>{{ ucwords($project->secondaryPic->name) }}</b>
                                                        </div>
                                                    @else
                                                        <small><i>Secondary PIC not specified</i></small>
                                                    @endif
                                                </dd>
                                            </dl>
                                        </div>

                                        <div class="col-md-6">
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Start Date</b></dt>
                                                @if ($project->status->nama=== 'On-Progress')
                                                    <dd>{{ date("F d, Y", strtotime($project->updated_at)) }}</dd>
                                                @else
                                                    <dd>Not applicable</dd>
                                                @endif
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>End Date</b></dt>
                                                <dd>{{ date("F d, Y", strtotime($project->target_date)) }}</dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Status</b></dt>
                                                <dd>
                                                    {{-- @php
                                                        $statusColor = $stat[$project->status] ?? 'badge-light'; // Default to 'badge-light' if status not found
                                                    @endphp --}}
                                                    <span class="">{{ $project->status->nama }}</span>
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Project Owner</b></dt>
                                                <dd>
                                                    @if ($project->projectOwner)
                                                        <div class="d-flex align-items-center mt-1">
                                                            {{-- Display project owner's information --}}
                                                            <b>{{ ucwords($project->projectOwner->divisi) }}</b> -
                                                            <b>{{ ucwords($project->projectOwner->group) }}</b> -
                                                            <b>{{ ucwords($project->projectOwner->subgroup) }}</b>
                                                        </div>
                                                    @else
                                                        <small><i>Project Owner not specified</i></small>
                                                    @endif
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Lead Subgroup</b></dt>
                                                <dd>
                                                    @if ($project->leadSubgroup)
                                                        <div class="d-flex align-items-center mt-1">
                                                            {{-- Display Lead Subgroup's information --}}
                                                            <b>{{ ucwords($project->leadSubgroup->subgroup) }}</b>
                                                        </div>
                                                    @else
                                                        <small><i>Lead Subgroup not specified</i></small>
                                                    @endif
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Secondary Subgroup</b></dt>
                                                <dd>
                                                    @if ($project->secondarySubgroup)
                                                        <div class="d-flex align-items-center mt-1">
                                                            {{-- Display Secondary Subgroup's information --}}
                                                            <b>{{ ucwords($project->secondarySubgroup->subgroup) }}</b>
                                                        </div>
                                                    @else
                                                        <small><i>Secondary Subgroup not specified</i></small>
                                                    @endif
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="border-bottom border-primary"><b>Imported File</b></dt>
                                                <dd>
                                                    @if ($project->imported_file)
                                                        <a href="{{ asset('storage/imported_files/' . $project->imported_file) }}" target="_blank">{{ $project->imported_file }}</a>
                                                    @else
                                                        <small><i>No imported file</i></small>
                                                    @endif
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <!-- End of your existing content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                <span><b>Task List:</b></span>
                                <div class="card-tools">
                                    @if (in_array(Auth::user()->role, ['GH', 'SPV', 'Staff']))
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTaskModal">
                                        Create New Task
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add your form or content for creating a new task here -->
                                            <!-- For example, you can add a form with input fields -->
                                            <form action="{{ route('tasks.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="project_id">Project ID</label>
                                                    <select name="project_id" id="project_id" class="form-control">
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="task">Task</label>
                                                    <input type="text" name="task" id="task" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Description</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status:</label>
                                                    <select class="form-control" name="asal_project" required id="asal_project">
                                                        <option value="1"> Todo </option>
                                                        <option value="2"> On Progress </option>  
                                                        <option value="3"> Testing</option>
                                                        <option value="4"> Waiting Deploy</option>
                                                        <option value="5"> Done</option>
                                                        <option value="6"> Cancel</option>
                                                        <option value="7"> Pending</option>
                                                        <option value="8"> inisiasi</option>
                                                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                    </select>
                                                </div>
                                                <!-- Add more input fields as needed -->
                                                <button type="submit" class="btn btn-primary">Create Task</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-condensed m-0 table-hover">
                                        <thead>
                                            <tr>
                                                <th class="border-right">No.</th>
                                                <th class="border-right">Task</th>
                                                <th class="border-right">Description</th>
                                                <th class="border-right">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks as $task)
                                            <tr>
                                                <td class="border-right">{{ $task->id }}</td>
                                                <td class="border-right">{{ $task->task }}</td>
                                                <td class="border-right">{{ $task->deskripsi }}</td>
                                                <td class="border-right">{{ $task->status }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
                                                    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span><b>Members Progress/Activity</b></span>
                            <div class="card-tools">
                                <!-- Tombol untuk membuka modal -->
                                @if (in_array(Auth::user()->role, ['GH', 'SPV', 'Staff']))
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProductivityModal">
                                    Add Progress Activity
                                </button>
                                @endif
                            </div>
                            @foreach($productivity as $row)
                            @if(auth()->id() == $row->user_id)
                                <div class="btn-group dropleft float-right">
                                    <span class="btndropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item manage_progress" href="javascript:void(0)" data-id="{{ $row->id }}" data-task="{{ $row->task->task }}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_progress" href="javascript:void(0)" data-id="{{ $row->id }}">Delete</a>
                                    </div>
                                </div>
                            @endif
                            <div class="user-block">
                                <span class="fa-stack fa-2x"style="font-size: 0.8em;">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <img src="{{ asset('assets/img/avatar.png') }}" alt="user image" class="fa-stack-1x fa-inverse">
                                  </span>
                                <span class="username">
                                    <a href="#">{{ ucwords($row->user->name) }}[ {{ ucwords($row->task->task) }} ]</a>
                                </span>
                                <span class="description">
                                    <span class="fa fa-calendar-day"></span>
                                    <span><b>{{ date('M d, Y', strtotime($row->date)) }}</b></span>
                                    <span class="fa fa-user-clock"></span>
                                    <span>Start: <b>{{ date('h:i A', strtotime($row->date.' '.$row->start_time)) }}</b></span>
                                    <span> | </span>
                                    <span>End: <b>{{ date('h:i A', strtotime($row->date.' '.$row->end_time)) }}</b></span>
                                </span>
                                <!-- Menampilkan Subject dan Comment -->
                                <div>
                                    <strong>Subject:</strong> {{ $row->subject }}
                                </div>
                                <div>
                                    {{ $row->comment }}
                                </div>
                            </div>
                            <hr> <!-- Garis pembatas -->
                        @endforeach
                        

                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="createProductivityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Progress Activity</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulir untuk input progress activity -->
                                        <form action="{{ route('productivity.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="project_id">Project ID</label>
                                                <select name="project_id" id="project_id" class="form-control">
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="task_id">Task ID</label>
                                                <select name="task_id" id="task_id" class="form-control">
                                                    @foreach ($tasks as $task)
                                                        <option value="{{ $task->id }}">{{ $task->task }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Comment</label>
                                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" id="subject" class="form-control" required>
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
                                                <label for="user_id">User ID</label>
                                                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="time_rendered">Time Rendered</label>
                                                <input type="time" name="time_rendered" id="time_rendered" class="form-control" required>
                                            </div>
                                            <!-- Tambahkan input lainnya sesuai dengan skema -->
                                            <button type="submit" class="btn btn-primary">Add Activity</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
    </div>
    <script>
        // Ambil elemen dropdown dan input tersembunyi
        var dropdown = document.getElementById("project_id");
        var projectNameInput = document.getElementById("project_name");
        console.log("Selected Project Name: " + projectName); // Periksa nilai di konsol browser
    
        // Tambahkan event listener untuk menangani perubahan pilihan pada dropdown
        dropdown.addEventListener("change", function() {
            // Ambil nama proyek (project_name) yang sesuai dengan ID yang dipilih
            var selectedOption = dropdown.options[dropdown.selectedIndex];
            var projectName = selectedOption.getAttribute("data-name");
    
            // Setel nilai input tersembunyi dengan nama proyek yang ditemukan
            projectNameInput.value = projectName;
        });
    </script>   
</div>
@endsection









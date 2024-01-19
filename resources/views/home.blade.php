@extends('layouts.app', [
  'namePage' => 'Dashboard',
  'class' => 'login-page sidebar-mini ',
  'activePage' => 'home',
  'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Dashboard</h4>
        </div>
        <div class="col-12">
          <div class="card">
          <div class="card bg-c-blue order-card">
            <div class="modal-body">
              <p>Welcome, {{ auth()->user()->name }}!</p>
              <p>Your role: {{ Auth::user()->role }}</p>
            </div>
          </div>
        </div>
        <hr>
        <!-- Cards for Status -->
        <div class="col-12">
        <div class="card">
        <div class="row">
          <!-- Todo -->
          <div class="col-md-3">
          <div class="card bg-c-cyan order-card">
              <div class="card-header">
                <div class="icon icon-primary">
                  <i class="now-ui-icons ui-2_time-alarm"></i>
                </div>
              </div>        
              <div class="card-body">
                <p class="card-title">To Do</p>
                <h3 class="card-category">{{ $todoCount }}</h3>
              </div>
            </div>
          </div>

          <!-- On-Progress -->
          <div class="col-md-3">
          <div class="card bg-c-green order-card">
              <div class="card-header">
                <div class="icon icon-success">
                  <i class="now-ui-icons business_bulb-63"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">On Progress</p>
                <h3 class="card-category">{{ $onProgressCount }}</h3>
              </div>
            </div>
          </div>

          <!-- Testing -->
          <div class="col-md-3">
          <div class="card bg-c-yellow order-card">
              <div class="card-header">
                <div class="icon icon-warning">
                  <i class="now-ui-icons ui-1_settings-gear-63"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">Testing</p>
                <h3 class="card-category">{{ $testingCount }}</h3>
              </div>
            </div>
          </div>

          <!-- Waiting-Deploy -->
          <div class="col-md-3">
          <div class="card bg-c-abu order-card">
              <div class="card-header">
                <div class="icon icon-info">
                  <i class="now-ui-icons ui-1_check"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">Waiting-Deploy</p>
                <h3 class="card-category">{{ $waitingDeployCount }}</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- Done -->
          <div class="col-md-3">
          <div class="card bg-c-blue order-card">
              <div class="card-header">
                <div class="icon icon-danger">
                  <i class="now-ui-icons ui-1_check"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">Done</p>
                <h3 class="card-category">{{ $doneCount }}</h3>
              </div>
            </div>
          </div>

          <!-- Cancel -->
          <div class="col-md-3">
          <div class="card bg-c-red order-card">
              <div class="card-header">
                <div class="icon icon-warning">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">Cancel</p>
                <h3 class="card-category">{{ $cancelCount }}</h3>
              </div>
            </div>
          </div>

          <!-- Pending -->
          <div class="col-md-3">
          <div class="card bg-c-orange order-card">
              <div class="card-header">
                <div class="icon icon-danger">
                  <i class="now-ui-icons ui-2_favourite-28"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">Pending</p>
                <h3 class="card-category">{{ $pendingCount }}</h3>
              </div>
            </div>
          </div>

          <!-- Inisiasi -->
          <div class="col-md-3">
          <div class="card bg-c-coklat order-card">
              <div class="card-header">
                <div class="icon icon-info">
                  <i class="now-ui-icons ui-1_settings-gear-63"></i>
                </div>
              </div>
              <div class="card-body">
                <p class="card-title">Inisiasi</p>
                <h3 class="card-category">{{ $inisiasiCount }}</h3>
              </div>
            </div>
          </div>
        </div>
        <!-- End Cards for Status -->

        <!-- Project Table -->
        <div class="row">
          <!-- Tabel Proyek -->
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Daftar Proyek</h4>
                      <div class="form-group">
                        <label for="search">Search by Project Name:</label>
                        <input type="text" class="form-control" id="search" placeholder="Enter project name">
                      </div>
                      <div class="form-group">
                        <label for="statusFilter">Filter by Status:</label>
                        <select id="statusFilter" class="form-control">
                          <option value="all">All</option>
                          <option value="todo">To Do</option>
                          <option value="onProgress">On Progress</option>
                          <option value="testing">Testing</option>
                          <option value="waitingDeploy">Waiting Deploy</option>
                          <option value="done">Done</option>
                          <option value="cancel">Cancel</option>
                          <option value="pending">Pending</option>
                          <option value="inisiasi">Inisiasi</option>
                        </select>
                      </div>
                  </div>
                  <div class="card-body p-0">
                      <div class="table-responsive">


                          <table class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th class="text-center">No</th>
                                      <th class="text-center">Project</th>
                                      <th class="text-center">Progress</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($projects as $project)
                                  <tr class="project-row project-{{ strtolower($project->status->nama) }}">
                                      <td class="text-center">{{ $loop->iteration }}</td>
                                      <td>{{ $project->project_name }}</td>
                                      <td>
                                          @if ($project->status->nama === 'On-Progress')
                                              @php
                                              $tasks = $project->tasks;
                                              $totalTasks = $tasks->count();
                                              $completedTasks = $tasks->where('status', 'Done')->count();
                                              $percentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
                                              @endphp
                                              <div class="progress">
                                                  <div class="progress-bar progress-bar-status-{{ $project->status }}" role="progressbar"
                                                      style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                      aria-valuemax="100">{{ $percentage }}%</div>
                                              </div>
                                          @else
                                              Not Applicable
                                          @endif
                                      </td>
                                      <td class="text-center">{{ $project->status->nama }}</td>
                                      <td class="text-center"><a href="{{ route('projects.show', ['project' => $project->id]) }}">Detail</a></td>
                                  </tr>
                                  @endforeach
                                  @if ($projects->isEmpty())
                                  <tr>
                                    <td colspan="5" class="text-center">No result</td>
                                  </tr>
                                  @endif
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      
          <!-- Card Proyek Todo -->
          <!-- Card Proyek Todo -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Proyek dengan Status "Todo"</h4>
              </div>
              <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                @if ($todoProjects->isEmpty())
                  <p>No Todo Projects available.</p>
                @else
                  @foreach ($todoProjects->take(3) as $todoProject)
                    <div class="card mb-3">
                      <div class="card-body">
                        <h5 class="card-title">{{ $todoProject->project_name }}</h5>
                        <p class="card-text">{{ $todoProject->description }}</p>
                        <p class="card-text"><strong>Target Date:</strong> {{ $todoProject->target_date }}</p>
                      </div>
                    </div>
                  @endforeach
                  @if ($todoProjects->isEmpty())
                  <p>No Todo Projects available.</p>
                  @endif
                @endif
              </div>
            </div>
          </div>
          

          </div>
      </div>
    </div>
  </div>
      
@endsection

@push('js')
<script>
  $(document).ready(function() {
    // Tambahkan event listener untuk perubahan dropdown
    $('#statusFilter').on('change', function() {
      var selectedStatus = $(this).val();

      // Semua proyek akan ditampilkan
      $('.project-row').show();

      if (selectedStatus !== 'all') {
        // Semua proyek yang tidak sesuai dengan status yang dipilih akan disembunyikan
        $('.project-row').not('.project-' + selectedStatus).hide();
      }
    });
  });
  $(document).ready(function() {
    // Show login success modal if it exists in the DOM
    if ($('#loginSuccessModal').length) {
      $('#loginSuccessModal').modal('show');
    }
  });
</script>
<script>
  $(document).ready(function() {
    // Tambahkan event listener untuk input pencarian
    $('#search').on('input', function() {
      var searchValue = $(this).val().toLowerCase();

      // Semua proyek akan ditampilkan
      $('.project-row').show();

      // Semua proyek yang tidak sesuai dengan nilai pencarian akan disembunyikan
      $('.project-row').each(function() {
        var projectName = $(this).find('td:nth-child(2)').text().toLowerCase();
        if (projectName.indexOf(searchValue) === -1) {
          $(this).hide();
        }
      });
    });
  });
</script>

@endpush

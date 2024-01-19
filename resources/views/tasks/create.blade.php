@php
    $activePage = 'task';
    $namePage = 'task';
@endphp
@extends('layouts.app')

@section('content')

<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Task Data</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="/cari_list">
                        @csrf
                        <div class="input-group">
                            <input type="text" placeholder="Cari Nama Task" required class="form-control form-control-sm"
                                name="keyword">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </div>
                    </form> 
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addTaskModal">Tambah Data</button>

                    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

                    <div class="table-responsive">

                    </div>
              
                    <div class="table-responsive">
                        @if(session('sukses'))
                        <div class="alert alert-success my-4">
                            {{session('sukses')}}
                        </div>
                        @endif

                        @if(session('hapus'))
                        <div class="alert alert-warning my-4">
                            {{session('hapus')}}
                        </div>
                        @endif

                        @if(session('update'))
                        <div class="alert alert-info my-4">
                            {{session('update')}}
                        </div>
                        @endif

                        <table class="table table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th>Id</th>
                                    <th>Project Id</th>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Timestamp</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = ($tasks->currentPage() - 1) * $tasks->perPage() + 1; @endphp
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$task->project_id}}</td>
                                    <td>{{$task->task}}</td>
                                    <td>{{$task->deskripsi}}</td>
                                    <td>{{$task->timestamp}}</td>
                                    <td>{{$task->created_at}}</td>
                                    <td>{{$task->updated_at}}</td>
                                    <td>
                                        <a href="/edit_list/{{$task->id}}" class="btn btn-link btn-info btn-icon btn-sm">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </a>
                                        <!-- Form hapus belum memiliki aksi yang sesuai -->
                                        <form class="d-inline" method="post" action="#">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$task->id}}">
                                            <button type="submit" class="btn btn-link btn-danger btn-icon btn-sm">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Tambah Data Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('tasks.store') }}">
                @csrf
                <div class="modal-body">
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


                    <!-- <div class="form-group">
                        <label for="timestamp">Timestamp</label>
                        <input type="date" name="timestamp" id="timestamp" class="form-control">
                    </div> -->

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3"></div>
                    {{$tasks->links()}} <!-- Use $tasks instead of $task -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

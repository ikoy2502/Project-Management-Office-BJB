@php
    $activePage = 'priority';
    $namePage = 'configure';
    $priorities = isset($priorities) ? $priorities : [];
@endphp
@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Priority List</h3>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('configure-priority.create') }}">
                    @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                
                        <button class="btn btn-primary">Add Priority</button>
                    </a>
                </li>


                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($priorities as $priority)
                            <tr>
                                <td>{{ $priority->id }}</td>
                                <td>{{ $priority->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

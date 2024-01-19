@php
$activePage = 'project-owners';
$namePage = 'project-owners';
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Project Owner</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Divisi</th>
                    <th>Group</th>
                    <th>Subgroup</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projectOwners as $projectOwner)
                    <tr>
                        <td>{{ $projectOwner->id }}</td>
                        <td>{{ $projectOwner->divisi }}</td>
                        <td>{{ $projectOwner->group }}</td>
                        <td>{{ $projectOwner->subgroup }}</td>
                        <td>
                            <a href="{{ route('project-owners.edit', $projectOwner->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('project-owners.destroy', $projectOwner->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('project-owners.create') }}" class="btn btn-success">Tambah Project Owner</a>
    </div>
@endsection

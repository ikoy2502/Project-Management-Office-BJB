@php
$activePage = 'index';
$namePage = 'owners';
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
        <h3>Daftar Project Owner</h3>

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
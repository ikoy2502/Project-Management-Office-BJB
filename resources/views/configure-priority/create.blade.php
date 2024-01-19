@php
    $activePage = 'create priority';
    $namePage = 'configure';
@endphp
@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Priority</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('priorities.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Priority Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Priority</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
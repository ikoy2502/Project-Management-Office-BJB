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
            <h3>Tambah Project Owner</h3>
          </div>
          <div class="card-body">
            <form action="{{ route('project-owners.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <input type="text" class="form-control" id="divisi" name="divisi">
                </div>
                <div class="form-group">
                    <label for="group">Group</label>
                    <input type="text" class="form-control" id="group" name="group">
                </div>
                <div class="form-group">
                    <label for="subgroup">Subgroup</label>
                    <input type="text" class="form-control" id="subgroup" name="subgroup">
                </div>
                <!-- Tambahkan field lain sesuai kebutuhan -->
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

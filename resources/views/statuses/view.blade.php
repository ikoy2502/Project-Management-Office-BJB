@php
$activePage = 'statuses';
$namePage = 'statuses';
@endphp

@extends('layouts.app')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
<div class="container">
    <h1>Config Status</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  <!-- Tambah Level Revisi Modal -->
<div class="modal fade" id="addStatusModal" tabindex="-1" role="dialog" aria-labelledby="addStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStatusModalLabel">Tambah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambahkan revisi -->
                <form action="{{ route('statuses.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <!-- Tambahkan input untuk kolom lain jika diperlukan -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->id}}</td>
                    <td>{{ $status->nama }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStatusModal{{ $status->id }}">Edit</button>
                        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                                <!-- Modal Edit Level Revisi -->
                    <div class="modal fade" id="editStatusModal{{ $status->id }}" tabindex="-1" role="dialog" aria-labelledby="editStatusModalLabel{{ $status->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStatusModalLabel">Edit Level Revisi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk mengedit revisi -->
                                <form action="{{ route('statuses.update', ['id' => $status->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="edit-name">Nama</label>
                                        <input type="text" class="form-control" id="edit-name" name="name" value="{{ $status->nama }}" required>
                                    </div>
                                    <!-- Tambahkan input untuk kolom lain jika diperlukan -->

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </tbody>
    </table>

    <!-- Tombol untuk menampilkan modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStatusModal">
        Tambah Status
    </button>
</div>

@endsection

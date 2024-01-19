@php
    $activePage = 'indexs';
    $namePage = 'Data user';
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
        <h1>Data Users</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
             Tambah User
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <!-- Kolom Password -->
                </tr>
            </thead>
            <tbody>
                
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                       <!-- Menampilkan Password (seharusnya dienkripsi) -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal Tambah User -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi form tambah user di sini -->
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <!-- Tambahkan input nama, email, role, password, dsb. sesuai dengan database -->
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="GH">GH</option>
                            <option value="MGR">MGR</option>
                            <option value="SPV">SPV</option>
                            <option value="Staff">Staff</option>
                            <option value="QA">QA</option>
                            <!-- Tambahkan pilihan role sesuai dengan database -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Tambahkan input lainnya sesuai dengan database -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </div>
@endsection

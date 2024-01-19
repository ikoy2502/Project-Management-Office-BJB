@extends('layouts.app', [
    'namePage' => 'Input',
    'class' => 'sidebar-mini',
    'activePage' => 'input',
])

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="form-container">
    <!-- Elemen-elemen formulir Anda -->
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form input</h4>
                </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Create</b>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('projects.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="project_code">Code</label>
                                        <input type="number" name="project_code" required class="form-control" value="{{ old('project_code') }}">
                                </div>
                             
                                <style>
                                        .custom-container {
                                            margin-left: 20px;
                                        }
                                </style>
                            <div class="mb-3">
                                <label for="project_name">Project Name</label>
                                    <input type="text" name="project_name" required class="form-control" value="{{ old('project_name') }}">
                            </div>
                            <div class="container-fluid mg-t-20">
                                <!-- Isi konten lainnya -->
                                <div class="row row-sm">
                                    <div class="col-xl-12">
                                        <!-- Isi konten Anda di sini -->
                                        <div class="mb-3 custom-container">
                              <label for="asal_project">Asal project</label>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1">Divisi</option>
                                  <option value="2">Group</option>
                                  <option value="3">Sub Group</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
                         
                            <div class="mb-3">
                                <label for="spesialis">Description</label>
                                <input type="text" name="spesialis" required class="form-control" id="spesialis" value="{{ old('spesialis') }}">
                            </div>
            
                            <style>
                                        .custom-container {
                                            margin-left: 0px;
                                        }
                                </style>
                               
                             <div class="mb-3 custom-container">
                              <label for="asal_project">Type</label>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1">Pengedaan</option>
                                  <option value="2">Pengembangan</option>
                                  <option value="3">Product Setup</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
            
                          <style>
                                        .custom-container {
                                            margin-left: 0px;
                                        }
                                </style>
                               
                             <div class="mb-3 custom-container">
                              <label for="asal_project">Lead subgroup</label>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1">Subgroup 1</option>
                                  <option value="2">Subgroup 2</option>
                                  <option value="3">Subgroup 3</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
            
                          <div class="mb-3 custom-container">
                              <label for="asal_project">Secondary subgroup</label>
                              <p2>* opsional<p2>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1">Sec group 1</option>
                                  <option value="2">Sec group 2</option>
                                  <option value="3">Sec group 3</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
            
                          <div class="mb-3 custom-container">
                              <label for="asal_project">Priority</label>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>  
                                  <option value="3"> 3</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
            
                          <div class="mb-3">
                                <label for="spesialis">Nama Pic Project</label>
                                <input type="text" name="spesialis" required class="form-control" id="spesialis" value="{{ old('spesialis') }}">
                            </div>
            
                            <div class="mb-3 custom-container">
                              <label for="asal_project">Secondary PIC</label>
                              <p2>* opsional<p2>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1"> PIC 1 </option>
                                  <option value="2"> PIC 2 </option>  
                                  <option value="3"> PIC 3</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
                          
                            <div class="mb-3">
                                <label for="diterima">Target Date</label>
                                <input type="date" name="diterima" required class="form-control" id="diterima" value="{{ old('spesialis') }}">
                            </div>
                            <div class="mb-3">
                                <label for="triwulan">Triwulan</label>
                                <input type="text" name="triwulan" class="form-control" id="triwulan" readonly>
                            </div>
                            
                            
                        {{-- <div class="mb-3 custom-container">
                          <label for="tanggal_target">Tanggal Target (Remaining Days)</label>
                          <input type="date" name="tanggal_target" required class="form-control" id="tanggal_target">
                        </div>
                      </head>
            <body>
                <div class="mb-3 custom-container">
                    <label for="tanggal_target">Tanggal Sekarang</label>
                    <input type="date" name="tanggal_target" required class="form-control" id="tanggal_target">
                </div>
            
                <div class="mb-3 custom-container">
                    <button onclick="hitungSisaHari()">Hitung Sisa Hari</button>
                    <p id="sisa_hari"></p>
                </div> --}}
            
                {{-- <script>
                    function hitungSisaHari() {
                        var inputTanggal = new Date(document.getElementById("tanggal_target").value);
                        var sekarang = new Date();
            
                        var timeDiff = inputTanggal - sekarang;
                        var sisaHari = Math.ceil(timeDiff / (1000 * 3600 * 24));
            
                        document.getElementById("sisa_hari").innerHTML = "Sisa hari: " + sisaHari + " hari";
                    }
                </script> --}}
            </body>
            </html>
            
                          <div class="mb-3 custom-container">
                              <label for="asal_project">Target Revisi</label>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                  <option value="1"> 1 </option>
                                  <option value="2"> 2 </option>  
                                  <option value="3"> 3</option>
                                  <option value="4"> 4</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
            
                          <div class="mb-3 custom-container">
                              <label for="asal_project">Status</label>
                              <select class="form-control" name="asal_project" required id="asal_project">
                                <option value="Todo">Todo</option>
                                <option value="On-Progress">On Progress</option>
                                <option value="Testing">Testing</option>
                                <option value="Waiting Deploy">Waiting Deploy</option>
                                <option value="Done">Done</option>
                                <option value="Cancel">Cancel</option>
                                <option value="Pending">Pending</option>
                                <option value="Inisiasi">Inisiasi</option>
                                  <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                              </select>
                          </div>
                                <button type="submit" class="btn btn-primary">Create Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <script>
                document.getElementById('diterima').addEventListener('change', function() {
                    const inputDate = new Date(this.value);
                    const month = inputDate.getMonth() + 1;
                    let triwulan = '';
            
                    if (month >= 1 && month <= 3) {
                        triwulan = 'TW 1';
                    } else if (month >= 4 && month <= 6) {
                        triwulan = 'TW 2';
                    } else if (month >= 7 && month <= 9) {
                        triwulan = 'TW 3';
                    } else if (month >= 10 && month <= 12) {
                        triwulan = 'TW 4';
                    }
            
                    document.getElementById('triwulan').value = triwulan;
                });
            </script>

@endsection

    @php
        $activePage = 'create';
        $namePage = 'create';
        $statues
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
            <h2>Create Project</h2>
            <form action="{{ route('projects.store') }}" method="POST" onsubmit="return validateForm()">


                @csrf
                <div class="form-group">
                    <label for="project_code">Project Code:</label>
                    <input type="text" name="project_code" class="form-control" id="project_code_input">
                    <span id="project-code-error" class="text-danger"></span>
                </div>
                
                <div class="form-group">
                    <label for="project_name">Project Name:</label>
                    <input type="text" name="project_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="project_owner_id">Project Owner:</label>
                    <select name="project_owner_id" class="form-control">
                        @foreach ($projectOwners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->id . ' - ' . $owner->divisi . ' - ' . $owner->group . ' - ' . $owner->subgroup }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lead_subgroup_id">Lead Subgroup:</label>
                    <select name="lead_subgroup_id" class="form-control">
                        @foreach ($projectOwners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->subgroup }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="secondary_subgroup_id">Secondary subgroup</label>
                    <select name="secondary_subgroup_id" class="form-control">
                        @foreach ($projectOwners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->id . ' - ' . $owner->divisi . ' - ' . $owner->group . ' - ' . $owner->subgroup }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority_id">Priority:</label>
                    <select name="priority_id" class="form-control">
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="pic_id">PIC (Person In Charge)</label>
                    <select name="pic_id" class="form-control">
                        <option value="">Select PIC</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="secondary_pic_id">Secondary PIC (Person In Charge)</label>
                    <select name="secondary_pic_id" class="form-control">
                        <option value="">Select Secondary PIC</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="target_date">Target Date:</label>
                    <input type="date" name="target_date" class="form-control" id="target_date">
                </div>
                <div class="form-group">
                    <label for="revisions">Target Revision:</label>
                    <select name="revisions" class="form-control">
                        @foreach ($revisions as $Revision)
                            <option value="{{ $Revision->id }}">{{ $Revision->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="triwulan">Triwulan:</label>
                    <input type="text" name="triwulan" id="triwulan" class="form-control" readonly>
                </div>                
                <div class="form-group">
                    <label for="status_id">Status:</label>
                    <select name="status_id" class="form-control">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="imported_file">Import File:</label>
                    <label class="custom-file-label" for="imported_file" id="file_name_label">Choose file</label>
                    <input type="file" class="custom-file-input" id="imported_file" name="imported_file" onchange="handleFileUpload()">
                </div>
                
                
                <button type="submit" class="btn btn-primary" id="submit-button">Create</button>
            </form>
        </div>
        <div id="validation-alert" class="alert alert-danger" style="display: none;">
    Harap isi semua kolom yang diperlukan!
</div>

    </div>

    <script>
        // Fungsi untuk menghasilkan triwulan berdasarkan tanggal target
        function generateQuarter() {
            const targetDate = new Date(document.getElementById('target_date').value);
            const quarter = Math.floor((targetDate.getMonth() + 3) / 3);
            document.getElementById('triwulan').value = `Q${quarter}`;
        }
    
        // Tambahkan event listener untuk memanggil fungsi generateQuarter saat input target_date berubah
        document.getElementById('target_date').addEventListener('change', generateQuarter);
    
        // Panggil generateQuarter saat halaman dimuat jika target_date sudah memiliki nilai
        if (document.getElementById('target_date').value) {
            generateQuarter();
        }
    </script>
<!-- Tambahkan elemen HTML untuk menampilkan pesan error -->

<script>
    // Fungsi untuk melakukan validasi kode proyek saat pengguna mengetik
    document.getElementById("project_code_input").addEventListener("input", function () {
    const projectCodeInput = this.value;

    // Periksa apakah kode yang dimasukkan oleh pengguna sudah ada dalam daftar kode proyek yang ada
    const projectCodes = @json($projects->pluck('project_code'));
    const isCodeExists = projectCodes.includes(projectCodeInput);

    // Tampilkan pesan kesalahan jika kode sudah ada atau hapus pesan kesalahan jika tidak
    if (isCodeExists) {
        document.getElementById("project-code-error").innerText = "Code Project Sudah Ada";
    } else {
        document.getElementById("project-code-error").innerText = "";
    }
});
</script>

<script>
    
    function validateForm() {
        // Ambil nilai dari setiap input
        var projectCode = document.getElementsByName("project_code")[0].value;
        var projectName = document.getElementsByName("project_name")[0].value;
        var projectOwner = document.getElementsByName("project_owner_id")[0].value;
        var description = document.getElementsByName("description")[0].value;
        var category = document.getElementsByName("category_id")[0].value;
        var leadSubgroup = document.getElementsByName("lead_subgroup_id")[0].value;
        var secondarySubgroup = document.getElementsByName("secondary_subgroup_id")[0].value;
        var priority = document.getElementsByName("priority_id")[0].value;
        var pic = document.getElementsByName("pic_id")[0].value;
        var secondaryPic = document.getElementsByName("secondary_pic_id")[0].value;
        var targetDate = document.getElementsByName("target_date")[0].value;
        var revisions = document.getElementsByName("revisions")[0].value;
        var triwulan = document.getElementsByName("triwulan")[0].value;
        var status = document.getElementsByName("status_id")[0].value;

        // Cek jika setiap input kosong
        if (
            projectCode === "" ||
            projectName === "" ||
            projectOwner === "" ||
            description === "" ||
            category === "" ||
            leadSubgroup === "" ||
            secondarySubgroup === "" ||
            priority === "" ||
            pic === "" ||
            secondaryPic === "" ||
            targetDate === "" ||
            revisions === "" ||
            triwulan === "" ||
            status === ""
        ) {
            // Tampilkan pesan peringatan
            document.getElementById("validation-alert").style.display = "block";

            // Menghentikan pengiriman formulir
            return false;
        }

        // Mengizinkan pengiriman formulir jika semua input diisi
        return true;
    }
</script>
<script>
    let selectedFile = null;

    // Fungsi ini akan dijalankan saat pengguna memilih file
    function handleFileUpload() {
        
        // Ambil elemen input file
        const inputFile = document.getElementById('imported_file');

        // Cek apakah ada file yang dipilih
        if (inputFile.files.length > 0) {
            // Simpan file yang dipilih dalam variabel sementara
            selectedFile = inputFile.files[0];

            // Tampilkan nama file yang dipilih pada label
            const fileNameLabel = document.getElementById('file_name_label');
            fileNameLabel.textContent = selectedFile.name;
        }
    }

    // Fungsi untuk mengajukan form ke server
    function submitForm() {
        // Ambil elemen input file
        const inputFile = document.getElementById('imported_file');

        // Cek apakah ada file yang dipilih
        if (inputFile.files.length > 0) {
            // Simpan file dalam FormData
            const formData = new FormData();
            formData.append('imported_file', selectedFile);

            // Kirim data ke server dengan menggunakan teknik AJAX atau Fetch
            fetch('{{ route("projects.store") }}', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json()) // Anda dapat mengubah format respons sesuai kebutuhan
            .then(data => {
                // Handle respons dari server (opsional)
                console.log(data);
                alert('Form berhasil diajukan ke server.');
            })
            .catch(error => {
                // Handle kesalahan jika terjadi (opsional)
                console.error(error);
                alert('Terjadi kesalahan saat mengirim form.');
            });
        } else {
            // Tampilkan pesan kesalahan jika tidak ada file yang dipilih
            alert('Silakan pilih file terlebih dahulu.');
        }
    }
</script>


@endsection


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Class</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Class</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
            Insert Data
        </button>
        <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Insert Data Class</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form menggunakan AJAX -->
                        <form id="insertForm">
                            <div class="mb-3">
                                <label for="idClass" class="form-label">ID Class</label>
                                <input type="text" class="form-control" id="idClass" name="idClass" required>
                            </div>
                            <div class="mb-3">
                                <label for="email_lecturer" class="form-label">Email Lecturer</label>
                                <input type="text" class="form-control" id="email_lecturer" name="email_lecturer" required>
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code Class</label>
                                <input type="text" class="form-control" id="code" name="code" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_subject" class="form-label">Name Subject</label>
                                <input type="text" class="form-control" id="name_subject" name="name_subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_lecturer" class="form-label">Name Lecturer</label>
                                <input type="text" class="form-control" id="name_lecturer" name="name_lecturer" required>
                            </div>
                            <div class="mb-3">
                                <label for="fakultas" class="form-label">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" name="fakultas" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="prodi" name="prodi" required>
                            </div>
                            <div class="mb-3">
                                <label for="sks" class="form-label">SKS</label>
                                <input type="text" class="form-control" id="sks" name="sks" required>
                            </div>
                            <div class="mb-3">
                                <label for="building" class="form-label">Building Room</label>
                                <input type="text" class="form-control" id="building" name="building" required>
                            </div>
                            <div class="mb-3">
                                <label for="lat" class="form-label">Room Latitude</label>
                                <input type="text" class="form-control" id="lat" name="lat" required>
                            </div>
                            <div class="mb-3">
                                <label for="long" class="form-label">Room Longitude</label>
                                <input type="text" class="form-control" id="long" name="long" required>
                            </div>
                            <div class="mb-3">
                                <label for="jadwal" class="form-label">Jadwal Class Day Time</label>
                                <input type="text" class="form-control" id="jadwal" name="jadwal" required>
                            </div>
                            <div class="mb-3">
                                <label for="daftar" class="form-label">Daftar Email Student</label>
                                <input type="text" class="form-control" id="daftar" name="daftar" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Class</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <button type="button" class="btn btn-success" onclick="submitForm()">Insert</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <br><br>
            <button type="button" class="btn btn-primary" onclick="showSearchForm()">Search Data</button>
            <div id="searchForm" style="display: none;">
                <h4 class="mt-4">Search Data</h4>
                <form class="mb-3">
                    <div class="mb-3">
                        <label for="searchTerm" class="form-label">Search Term</label>
                        <input type="text" class="form-control" id="searchTerm" name="searchTerm" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="searchData()">Search</button>
                    <button type="button" class="btn btn-danger" onclick="deleteData()">Delete</button>
                    <button type="button" class="btn btn-secondary" onclick="hideSearchForm()">Close</button>
                </form>
            </div>
            <br><br>
            <button type="button" class="btn btn-primary" id="showTableBtn" onclick="toggleTable()">View Table</button>
            <table class="table table-striped table-bordered table-hover" id="studentsTable" style="display: none;">
                <thead>
                    <tr>
                        <th class="text_center">ID Class</th>
                        <th class="text_center">Email Lecturer</th>
                        <th class="text_center">Code Class</th>
                        <th class="text_center">Name Subject</th>
                        <th class="text_center">Name Lecturer</th>
                        <th class="text_center">Fakultas</th>
                        <th class="text_center">Prodi</th>
                        <th class="text_center">SKS</th>
                        <th class="text_center">Building Room</th>
                        <th class="text_center">Room Latitude</th>
                        <th class="text_center">Room Longitude</th>
                        <th class="text_center">Jadwal Class Day Time</th>
                        <th class="text_center">Daftar Email Student</th>
                        <th class="text_center">Created At</th>
                        <th class="text_center">Status Class</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function submitForm() {
                var idClass = $('#idClass').val();
                var email_lecturer = $('#email_lecturer').val();
                var code = $('#code').val();
                var name_subject = $('#name_subject').val();
                var name_lecturer = $('#name_lecturer').val();
                var fakultas = $('#fakultas').val();
                var prodi = $('#prodi').val();
                var sks = $('#sks').val();
                var building = $('#building').val();
                var lat = $('#lat').val();
                var long = $('#long').val();
                var jadwal = $('#jadwal').val();
                var daftar = $('#daftar').val();
                var status = $('#status').val();

                if (idClass.trim() == '' || email_lecturer.trim() == '' || code.trim() == '' || name_subject.trim() == '' || name_lecturer.trim() == '' || fakultas.trim() == '' || prodi.trim() == '' || sks.trim() == '' || building.trim() == '' || lat.trim() == '' || long.trim() == '' || jadwal.trim() == '' || daftar.trim() == '' || status.trim() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Mohon lengkapi semua kolom data!',
                    });
                    return;
                }

                var formData = $('#insertForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: 'insertclass.php',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        $('#insertModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response,
                        });
                        loadTable();
                    },
                    error: function(error) {
                        console.error('Gagal menambahkan data:', error);
                    }
                });
            }

            function showSearchForm() {
                $('#studentsTable').slideUp();
                $('#searchForm').slideDown();
            }

            function hideSearchForm() {
                $('#searchForm').slideUp();
                $('#studentsTable').slideDown();
            }

            function searchData() {
                var searchTerm = $('#searchTerm').val();
                $.ajax({
                    type: 'POST',
                    url: 'searchdataclass.php', 
                    data: { searchTerm: searchTerm },
                    success: function(data) {
                        $('#studentsTable tbody').html(data);
                    },
                    error: function(error) {
                        console.error('Gagal mencari data:', error);
                    }
                });
            }

            function deleteData() {
                var searchTerm = $('#searchTerm').val();

                $.ajax({
                    type: 'POST',
                    url: 'deletedatalist.php', 
                    data: { searchTerm: searchTerm },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response,
                        });
                        loadTable();
                    },
                    error: function(error) {
                        console.error('Gagal menghapus data:', error);
                    }
                });
            }

            function toggleTable() {
                var table = $('#studentsTable');
                if (table.is(':visible')) {
                    table.slideUp();
                } else {
                    table.slideDown();
                    loadTable();
                }
            }

            function loadTable() {
                $.ajax({
                    type: 'GET',
                    url: 'getdataclass.php', 
                    success: function(data) {

                        $('#studentsTable tbody').html(data);
                    },
                    error: function(error) {
                        console.error('Gagal memuat data:', error);
                    }
                });
            }
    </script>
    </body>
    </html>

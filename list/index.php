<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Attendance List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Attendance List</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
            Insert Data
        </button>
        <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Insert Data Operator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form menggunakan AJAX -->
                        <form id="insertForm">
                            <div class="mb-3">
                                <label for="idAttendance" class="form-label">ID Attendance</label>
                                <input type="text" class="form-control" id="idAttendance" name="idAttendance" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title Short</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="title" name="title" value="Attendance #" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date Attendance</label>
                                <input type="date" class="form-control" id="date" name="date" min="<?= date('Y-m-d', strtotime('last Sunday')); ?>" max="<?= date('Y-m-d', strtotime('next Saturday')); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time Attendance</label>
                                <select class="form-select" id="time" name="time" required>
                                    <option value="07.10 - 08.30">07.10 - 08.30</option>
                                    <option value="08.40 - 10.00">08.40 - 10.00</option>
                                    <option value="10.10 - 11.30">10.10 - 11.30</option>
                                    <option value="13.10 - 14.30">13.10 - 14.30</option>
                                    <option value="14.40 - 16.00">14.40 - 16.00</option>
                                    <option value="16.10 - 17.30">16.10 - 17.30</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="idClass" class="form-label">ID Class</label>
                                <input type="text" class="form-control" id="idClass" name="idClass" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Name Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Lecturer</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name Lecturer</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
                                <label for="max" class="form-label">Max Radius</label>
                                <input type="text" class="form-control" id="max" name="max" required>
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
                        <th>ID Attendance</th>
                        <th>Title Short</th>
                        <th>Date Attendance</th>
                        <th>Time Attendance</th>
                        <th>ID Class</th>
                        <th>Name Subject</th>
                        <th>Email Lecturer</th>
                        <th>Name Lecturer</th>
                        <th>Room Latitude</th>
                        <th>Room Longitude</th>
                        <th>Max Radius</th>
                        <th>Created At</th>
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
                var idAttendance = $('#idAttendance').val();
                var title = $('#title').val();
                var date = $('#date').val();
                var time = $('#time').val();
                var idClass = $('#idClass').val();
                var subject = $('#subject').val();
                var email = $('#email').val();
                var name = $('#name').val();
                var lat = $('#lat').val();
                var long = $('#long').val();
                var max = $('#max').val();

                if (!idAttendance || !title || !date || !time || !idClass || !subject || !email || !name || !lat || !long || !max) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Aaw...',
                        text: 'Isi semua kolom sebelum menambahkan data.',
                    });
                    return; 
                }

                var formData = $('#insertForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: 'insertlist.php',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        $('#insertModal').modal('hide');
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
                    url: 'searchdatalist.php', 
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
                    url: 'getdatalist.php', 
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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Attendance Histoy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Attendance History</h2>
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
                                <label for="idClass" class="form-label">ID Class</label>
                                <input type="text" class="form-control" id="idClass" name="idClass" required>
                            </div>
                            <div class="mb-3">
                                <label for="idAttendance" class="form-label">ID Attendance</label>
                                <input type="text" class="form-control" id="idAttendance" name="idAttendance" required>
                            </div>
                            <div class="mb-3">
                                <label for="email_student" class="form-label">Email Student</label>
                                <input type="text" class="form-control" id="email_student" name="email_student" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="email_lecturer" class="form-label">Email Lecturer</label>
                                <input type="text" class="form-control" id="email_lecturer" name="email_lecturer" required>
                            </div>
                            <div class="mb-3">
                                <label for="lat" class="form-label">Student Latitude</label>
                                <input type="text" class="form-control" id="lat" name="lat" required>
                            </div>
                            <div class="mb-3">
                                <label for="long" class="form-label">Student Longitude</label>
                                <input type="text" class="form-control" id="long" name="long" required>
                            </div>
                            <div class="mb-3">
                                <label for="distance" class="form-label">Distance</label>
                                <input type="text" class="form-control" id="distance" name="distance" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time Take Attendance</label>
                                <input type="text" class="form-control" id="time" name="time" required pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" placeholder="HH:mm:ss">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                <option value="P">P</option>
                                <option value="L">L</option>
                                <option value="E">E</option>
                                <option value="U">U</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Note</label>
                                <input type="text" class="form-control" id="note" name="note" required>
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
                        <th class="text_center">ID Attendance</th>
                        <th class="text_center">Email Student</th>
                        <th class="text_center">Subject</th>
                        <th class="text_center">Email Lecturer</th>
                        <th class="text_center">Student Latitude</th>
                        <th class="text_center">Student Longitude</th>
                        <th class="text_center">Distance</th>
                        <th class="text_center">Time Take Attendance</th>
                        <th class="text_center">Status</th>
                        <th class="text_center">Note</th>
                        <th class="text_center">Created At</th>
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
                var idAttendance = $('#idAttendance').val();
                var email = $('#email_student').val();
                var subject = $('#subject').val();
                var email_lecturer = $('#email_lecturer').val();
                var lat = $('#lat').val();
                var long = $('#long').val();
                var distance = $('#distance').val();
                var time = $('#time').val();
                var status = $('#status').val();
                var note = $('#note').val();

                if (idClass.trim() == '' || idAttendance.trim() == '' || email.trim() == '' || subject.trim() == '' || email_lecturer.trim() == '' || lat.trim() == '' || long.trim() == '' || distance.trim() == '' || time.trim() == '' || status.trim() == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Kolom data tidak boleh kosong!',
                    });
                    return;
                }

                var formData = $('#insertForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: 'inserthistory.php',
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
                    url: 'getdatahistory.php', 
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

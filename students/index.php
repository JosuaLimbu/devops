<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Mahasiswa</h2>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
            Insert Data
        </button>

        <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Insert Data Students</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="insertForm">
                            <div class="mb-3">
                                <label for="regNumber" class="form-label">Registration Number</label>
                                <input type="text" class="form-control" id="regNumber" name="regNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="nimNumber" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nimNumber" name="nimNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
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
                    <th class="text_center">Registration Number</th>
                    <th class="text_center">NIM</th>
                    <th class="text_center">Email</th>
                    <th class="text_center">Full Name</th>
                    <th class="text_center">Created At</th>
                    <th class="text_center">Updated At</th>
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
            var regNumber = $('#regNumber').val();
            var nimNumber = $('#nimNumber').val();
            var email = $('#email').val();
            var fullName = $('#fullName').val();
            if (!regNumber || !nimNumber || !email || !fullName) {
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
                url: 'insertstudents.php',
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
                url: 'searchdatastudents.php', 
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
                url: 'deletedatastudents.php', 
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
                url: 'getdatastudents.php', 
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

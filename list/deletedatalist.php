<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query untuk menghapus data sesuai dengan kriteria pencarian
    $sqlDelete = "DELETE FROM tbl_attendance_list 
                  WHERE id_attendance LIKE '%$searchTerm%' 
                  OR title_short LIKE '%$searchTerm%' 
                  OR date_attendance LIKE '%$searchTerm%' 
                  OR time_attendance LIKE '%$searchTerm%' 
                  OR id_class LIKE '%$searchTerm%' 
                  OR name_subject LIKE '%$searchTerm%' 
                  OR email_lecturer LIKE '%$searchTerm%' 
                  OR name_lecturer LIKE '%$searchTerm%' 
                  OR room_latitude LIKE '%$searchTerm%' 
                  OR room_longitude LIKE '%$searchTerm%' 
                  OR max_radius LIKE '%$searchTerm%' 
                  OR created_at LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sqlDelete);
    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

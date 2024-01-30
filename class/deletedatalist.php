<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query untuk menghapus data sesuai dengan kriteria pencarian
    $sqlDelete = "DELETE FROM tbl_classes 
                    WHERE id_class LIKE '%$searchTerm%' 
                    OR email_lecturer LIKE '%$searchTerm%' 
                    OR code_class LIKE '%$searchTerm%' 
                    OR name_subject LIKE '%$searchTerm%' 
                    OR name_lecturer LIKE '%$searchTerm%' 
                    OR fakultas LIKE '%$searchTerm%' 
                    OR prodi LIKE '%$searchTerm%' 
                    OR sks LIKE '%$searchTerm%' 
                    OR building_room LIKE '%$searchTerm%' 
                    OR room_latitude LIKE '%$searchTerm%' 
                    OR room_longitude LIKE '%$searchTerm%' 
                    OR jadwal_class_day_time LIKE '%$searchTerm%' 
                    OR daftar_email_student LIKE '%$searchTerm%' 
                    OR created_at LIKE '%$searchTerm%' 
                    OR status_class LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sqlDelete);
    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query untuk menghapus data sesuai dengan kriteria pencarian
    $sqlDelete = "DELETE FROM tbl_attendance_history
                    WHERE id_class LIKE '%$searchTerm%' 
                    OR id_attendance LIKE '%$searchTerm%' 
                    OR email_student LIKE '%$searchTerm%' 
                    OR name_subject LIKE '%$searchTerm%' 
                    OR email_lecturer LIKE '%$searchTerm%' 
                    OR student_lat LIKE '%$searchTerm%' 
                    OR student_long LIKE '%$searchTerm%' 
                    OR distance LIKE '%$searchTerm%' 
                    OR time_take_attendance LIKE '%$searchTerm%' 
                    OR status LIKE '%$searchTerm%' 
                    OR note LIKE '%$searchTerm%' 
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

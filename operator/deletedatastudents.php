<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query untuk menghapus data sesuai dengan kriteria pencarian
    $sqlDelete = "DELETE FROM tbl_operator WHERE nip LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR fullname LIKE '%$searchTerm%' OR password LIKE '%$searchTerm%' OR phone_number LIKE '%$searchTerm%' OR role LIKE '%$searchTerm%' OR created_at LIKE '%$searchTerm%' OR updated_at LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sqlDelete);

    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

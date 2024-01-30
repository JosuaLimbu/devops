<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regNumber = $_POST["regNumber"];
    $nimNumber = $_POST["nimNumber"];
    $email = $_POST["email"];
    $fullName = $_POST["fullName"];

    // Mendapatkan tanggal sekarang dengan format yang diinginkan
    $currentDateTime = date('Y-m-d H:i:s');

    $sqlInsert = "INSERT INTO tbl_students (reg_number, nim_number, email, fullname, created_at, updated_at) VALUES ('$regNumber', '$nimNumber', '$email', '$fullName', '$currentDateTime', '$currentDateTime')";
    mysqli_query($conn, $sqlInsert);

    echo "Data berhasil ditambahkan.";
}

mysqli_close($conn);
?>

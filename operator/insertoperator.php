<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $role = $_POST['role'];
    $currentDateTime = date('d-m-Y H:i:s');

    $sqlInsert = "INSERT INTO tbl_operator (nip, email, fullname, password, phone_number, role, created_at, updated_at) VALUES ('$nip', '$email', '$fullName', '$password', '$phoneNumber', '$role', '$currentDateTime', '$currentDateTime')";
    mysqli_query($conn, $sqlInsert);

    echo "Data berhasil ditambahkan.";
}

mysqli_close($conn);
?>

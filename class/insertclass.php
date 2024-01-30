<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $idClass = $_POST['idClass'];
    $email_lecturer = $_POST['email_lecturer'];
    $code = $_POST['code'];
    $subject = $_POST['name_subject'];
    $name_lecturer = $_POST['name_lecturer'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $sks = $_POST['sks'];
    $building = $_POST['building'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $jadwal = $_POST['jadwal'];
    $daftar = $_POST['daftar'];
    $status = $_POST['status'];
    $currentDateTime = date('Y-m-d H:i:s');

    $sqlInsert = "INSERT INTO tbl_classes (id_class, email_lecturer, code_class, name_subject, name_lecturer, fakultas, prodi, sks, building_room, room_latitude, room_longitude, jadwal_class_day_time, daftar_email_student, created_at, status_class) VALUES ('$idClass', '$email_lecturer', '$code', '$subject', '$name_lecturer', '$fakultas', '$prodi', '$sks', '$building', '$lat', '$long', '$jadwal', '$daftar', '$currentDateTime', '$status')";
    mysqli_query($conn, $sqlInsert);

    echo "Data berhasil ditambahkan.";
}

mysqli_close($conn);
?>

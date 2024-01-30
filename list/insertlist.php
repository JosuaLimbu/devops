<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAttendance = $_POST['idAttendance'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $idClass = $_POST['idClass'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $max = $_POST['max'];
    $currentDateTime = date('Y-m-d H:i:s');



    $sqlInsert = "INSERT INTO tbl_attendance_list (id_attendance, title_short, date_attendance, time_attendance, id_class, name_subject, email_lecturer, name_lecturer, room_latitude, room_longitude, max_radius, created_at) VALUES ('$idAttendance', '$title', '$date', '$time', '$idClass', '$subject', '$email', '$name', '$lat', '$long', '$max', '$currentDateTime')";
    mysqli_query($conn, $sqlInsert);

    echo "Data berhasil ditambahkan.";
}

mysqli_close($conn);
?>

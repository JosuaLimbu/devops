<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idClass = $_POST['idClass'];
    $idAttendance = $_POST['idAttendance'];
    $email = $_POST['email_student'];
    $subject = $_POST['subject'];
    $email_lecturer = $_POST['email_lecturer'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    $note = $_POST['note'];
    $currentDateTime = date('Y-m-d H:i:s');

    $sqlInsert = "INSERT INTO tbl_attendance_history (id_class, id_attendance, email_student, name_subject, email_lecturer, student_lat, student_long, distance, time_take_attendance, status, note, created_at) VALUES ('$idClass', '$idAttendance', '$email', '$subject', '$email_lecturer', '$lat', '$long', '$distance', '$time', '$status', '$note', '$currentDateTime')";
    mysqli_query($conn, $sqlInsert);

    echo "Data berhasil ditambahkan.";
}

mysqli_close($conn);
?>

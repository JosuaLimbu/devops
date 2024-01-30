<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sqlSelect = "SELECT * FROM tbl_attendance_history";
$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_class'] . "</td>";
        echo "<td>" . $row['id_attendance'] . "</td>";
        echo "<td>" . $row['email_student'] . "</td>";
        echo "<td>" . $row['name_subject'] . "</td>";
        echo "<td>" . $row['email_lecturer'] . "</td>";
        echo "<td>" . $row['student_lat'] . "</td>";
        echo "<td>" . $row['student_long'] . "</td>";
        echo "<td>" . $row['distance'] . "</td>";
        echo "<td>" . $row['time_take_attendance'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['note'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data mahasiswa</td></tr>";
}

mysqli_close($conn);
?>

<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sqlSelect = "SELECT * FROM tbl_classes";
$result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_class'] . "</td>";
        echo "<td>" . $row['email_lecturer'] . "</td>";
        echo "<td>" . $row['code_class'] . "</td>";
        echo "<td>" . $row['name_subject'] . "</td>";  
        echo "<td>" . $row['name_lecturer'] . "</td>";
        echo "<td>" . $row['fakultas'] . "</td>";
        echo "<td>" . $row['prodi'] . "</td>";
        echo "<td>" . $row['sks'] . "</td>";
        echo "<td>" . $row['building_room'] . "</td>";
        echo "<td>" . $row['room_latitude'] . "</td>";
        echo "<td>" . $row['room_longitude'] . "</td>";
        echo "<td>" . $row['jadwal_class_day_time'] . "</td>";
        echo "<td>" . $row['daftar_email_student'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td>" . $row['status_class'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data mahasiswa</td></tr>";
}


mysqli_close($conn);
?>

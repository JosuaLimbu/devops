<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query pencarian data tanpa mencari pada kolom updated_at
    $sqlSelect = "SELECT * FROM tbl_classes 
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
        echo "<tr><td colspan='6'>Tidak ada data yang sesuai dengan pencarian</td></tr>";
    }
}

mysqli_close($conn);
?>

<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query pencarian data tanpa mencari pada kolom updated_at
    $sqlSelect = "SELECT * FROM tbl_attendance_list 
                  WHERE id_attendance LIKE '%$searchTerm%' 
                  OR title_short LIKE '%$searchTerm%' 
                  OR date_attendance LIKE '%$searchTerm%' 
                  OR time_attendance LIKE '%$searchTerm%' 
                  OR id_class LIKE '%$searchTerm%' 
                  OR name_subject LIKE '%$searchTerm%' 
                  OR email_lecturer LIKE '%$searchTerm%' 
                  OR name_lecturer LIKE '%$searchTerm%' 
                  OR room_latitude LIKE '%$searchTerm%' 
                  OR room_longitude LIKE '%$searchTerm%' 
                  OR max_radius LIKE '%$searchTerm%' 
                  OR created_at LIKE '%$searchTerm%'";

    $result = mysqli_query($conn, $sqlSelect);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_attendance'] . "</td>";
            echo "<td>" . $row['title_short'] . "</td>";
            echo "<td>" . $row['date_attendance'] . "</td>";
            echo "<td>" . $row['time_attendance'] . "</td>";
            echo "<td>" . $row['id_class'] . "</td>";
            echo "<td>" . $row['name_subject'] . "</td>";
            echo "<td>" . $row['email_lecturer'] . "</td>";
            echo "<td>" . $row['name_lecturer'] . "</td>";
            echo "<td>" . $row['room_latitude'] . "</td>";
            echo "<td>" . $row['room_longitude'] . "</td>";
            echo "<td>" . $row['max_radius'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data yang sesuai dengan pencarian</td></tr>";
    }
}

mysqli_close($conn);
?>

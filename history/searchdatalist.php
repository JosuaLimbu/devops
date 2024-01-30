<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query pencarian data tanpa mencari pada kolom updated_at
    $sqlSelect = "SELECT * FROM tbl_attendance_history 
                  WHERE id_class LIKE '%$searchTerm%' 
                  OR id_attendance LIKE '%$searchTerm%' 
                  OR email_student LIKE '%$searchTerm%' 
                  OR name_subject LIKE '%$searchTerm%' 
                  OR email_lecturer LIKE '%$searchTerm%' 
                  OR student_lat LIKE '%$searchTerm%' 
                  OR student_long LIKE '%$searchTerm%' 
                  OR distance LIKE '%$searchTerm%' 
                  OR time_take_attendance LIKE '%$searchTerm%' 
                  OR status LIKE '%$searchTerm%' 
                  OR note LIKE '%$searchTerm%' 
                  OR created_at LIKE '%$searchTerm%'";

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
        echo "<tr><td colspan='6'>Tidak ada data yang sesuai dengan pencarian</td></tr>";
    }
}

mysqli_close($conn);
?>

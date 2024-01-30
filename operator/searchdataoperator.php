<?php
$conn = mysqli_connect("localhost", "root", "limbujosua23", "db_unklab");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    // Query pencarian data
    $sqlSelect = "SELECT * FROM tbl_operator WHERE nip LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR fullname LIKE '%$searchTerm%' OR password LIKE '%$searchTerm%' OR phone_number LIKE '%$searchTerm%' OR role LIKE '%$searchTerm%' OR created_at LIKE '%$searchTerm%' OR updated_at LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sqlSelect);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["nip"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["fullname"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "<td>" . $row["updated_at"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data yang sesuai dengan pencarian</td></tr>";
    }
}

mysqli_close($conn);
?>
